<?php

namespace Oktolab\DelorianBundle\Model;

use Oktolab\MediaBundle\Entity\Episode;


class TimetravelService {

    private $flow_service;
    private $delorian_em;
    private $adapters;
    private $jobservice;
    private $episode_class;
    private $series_class;
    private $worker_queue;
    private $asset_service;
    private $media_service;
    private $logbook;

    public function __construct($flow_service, $delorian_manager, $adapters, $jobservice, $episode_class, $series_class, $worker_queue, $asset_service, $media_service, $encoding_filesystem, $logbook) {
        $this->adapters = $adapters;
        $this->flow_service = $flow_service;
        $this->delorian_em = $delorian_manager;
        $this->jobservice = $jobservice;
        $this->episode_class = $episode_class;
        $this->series_class = $series_class;
        $this->worker_queue = $worker_queue;
        $this->asset_service = $asset_service;
        $this->media_service = $media_service;
        $this->encoding_filesystem = $encoding_filesystem;
        $this->logbook = $logbook;
    }

    /**
    * adds timetraveljob for given episode id
    */
    public function fluxCompensateEpisode($id) {
        $this->jobservice->addJob(
            "Oktolab\DelorianBundle\Model\TimetravelJob",
            [
                'type' => 'episode',
                'id' => $id
            ],
            $this->worker_queue
        );
    }

    /**
    * adds timetraveljob for all episodes of a series
    */
    public function fluxCompensateSeriesEpisodes($id) {
        $old_episodes = $this->flow_service->getEpisodes($id);
        foreach ($old_episodes as $episode) {
            $this->jobservice->addJob(
                "Oktolab\DelorianBundle\Model\TimetravelJob",
                ['type' => 'episode', 'id' => $episode->getId()],
                $this->worker_queue
            );
        }
    }

    /**
    * adds timetraveljob for given series id
    */
    public function fluxCompensateSeries($id) {
        $this->jobservice->addJob(
            "Oktolab\DelorianBundle\Model\TimetravelJob",
            array('type' => 'series', 'id' => $id),
            $this->worker_queue
        );
    }

    /**
    * transforms an old episode from flow to a new standartized episode for the OktolabMediaBundle.
    * kicks a worker to search and import the required data (video, posterframe)
    */
    public function timetravelEpisode($id) {
        $old_episode = $this->flow_service->getEpisode($id);
        if ($old_episode) {
            $episode = $this->delorian_em->getRepository($this->episode_class)
                ->findOneBy(
                    ['uniqID' => $old_episode->getId()]
            );

            if (!$episode) {
                $episode = new $this->episode_class;
            }

            $old_series = $old_episode->getSeries();
            $series = $this->delorian_em->getRepository($this->series_class)
                ->findOneBy(
                    ['uniqID' => $old_series->getId()]
            );

            if (!$series) {
                $series = new $this->series_class;
                $series->setUniqID($old_series->getId());
                $series->setName($old_series->getTitle());
                $series->setWebTitle($old_series->getWebAbbrevation());
                $series->setDescription($old_series->getAbstractTextPublic());
                $this->importSeriesPosterframe($series);
            }

            if ($old_episode->getTitle() == "" || $old_episode->getTitle() == null ) {
                //use the name of the first clip
                $episodeclips = $this->flow_service->getClips($old_episode->getId());
                if ($episodeclips) {
                    $episode->setName($episodeclips[0]->getClip()->getTitle());
                }
            } else {
                $episode->setName($old_episode->getTitle());
            }
            $episode->setDescription($old_episode->getAbstractTextPublic());
            $episode->setUniqID($old_episode->getId());
            $episode->setOnlineStart($old_episode->getOnlineStartDate());
            $episode->setOnlineEnd($old_episode->getOnlineEndDate());
            $episode->setFirstranAt($old_episode->getFirstRanAt());
            $episode->setSeries($series);

            $this->importEpisodePosterframe($episode);
            $this->importEpisodeVideo($episode);

            $this->delorian_em->persist($episode);
            $this->delorian_em->persist($series);
            $this->delorian_em->flush();
            $this->delorian_em->clear();

            if ($episode->getVideo()) {
                $this->media_service->addEncodeEpisodeJob($episode->getUniqID());
            }
        }
    }

    public function timetravelSeries($id) {
        $old_series = $this->flow_service->getSeries($id);
        if ($old_series) {
            $series = $this->delorian_em->getRepository($this->series_class)->findOneBy(array('uniqID' => $old_series->getId()));
            if (!$series) {
                $series = new $this->series_class;
            }
            $series->setUniqID($old_series->getId());
            $series->setName($old_series->getTitle());
            $series->setWebTitle($old_series->getWebAbbrevation());
            $series->setDescription($old_series->getAbstractTextPublic());
            $this->importSeriesPosterframe($series);
            $this->delorian_em->persist($series);
            $this->delorian_em->flush();
        }
    }

    /**
    * loads image from database, base64_decode(s) image and saves it as bprsAsset to the filestorage.
    */
    public function importEpisodePosterframe($episode)
    {
        $this->logbook->info('delorian.import_posterframe_start', [], $episode->getUniqID());
        $attachment = $this->flow_service->getAttachment($episode);
        if ($attachment) {
            // decode blob and save as file to the filesystem
            $name = uniqID();
            //add posterframe as Asset to the Episode
            $asset = $this->asset_service->createAsset();
            $asset->setFilekey($name);
            $asset->setAdapter('posterframe');
            $asset->setName($attachment->getFileName());
            $asset->setFileSize($attachment->getFileSize());
            $asset->setMimetype($attachment->getMimetype());

            $this->logbook->info('delorian.import_posterframe_writing_file', ['%asset%' => $asset], $episode->getUniqID());
            $filesystem = $this->asset_service->getHelper()->getFilesystem($asset->getAdapter());
            $filesystem->write($asset->getFilekey(), $attachment->getContent());

            if ($episode->getPosterframe()) {
                $posterframe = $episode->getPosterframe();
                $this->logbook->info('delorian.import_posterframe_removed_old', ['%asset%' => $posterframe], $episode->getUniqID());
                $episode->setPosterframe(null);
                $this->asset_service->deleteAsset($posterframe);
            }

            $episode->setPosterframe($asset);
            $this->delorian_em->persist($asset);
        }
        $this->logbook->info('delorian.import_posterframe_end', [], $episode->getUniqID());
    }

    public function importSeriesPosterframe($series)
    {
        $this->logbook->info('delorian.import_series_posterframe_start', [], $series->getUniqID());
        $attachment = $this->flow_service->getSeriesAttachment($series);
        if ($attachment) {
            // decode blob and save as file to the filesystem
            $name = uniqID();
            //add posterframe as Asset to the Episode
            $asset = $this->asset_service->createAsset();
            $asset->setFilekey($name);
            $asset->setAdapter('posterframe');
            $asset->setName($attachment->getFileName());
            $asset->setFileSize($attachment->getFileSize());
            $asset->setMimetype($attachment->getMimetype());

            $this->logbook->info('delorian.import_posterframe_writing_file', ['%asset%' => $asset], $series->getUniqID());
            $filesystem = $this->asset_service->getHelper()->getFilesystem($asset->getAdapter());
            $filesystem->write($asset->getFilekey(), $attachment->getContent());

            // delete old posterframe
            if ($series->getPosterframe()) {
                $this->asset_service->deleteAsset($series->getPosterframe());
            }
            $series->setPosterframe($asset);
            $this->delorian_em->persist($series);
            $this->delorian_em->persist($asset);
        }
        $this->logbook->info('delorian.import_series_posterframe_end', [], $series->getUniqID());
    }

    /**
    * uses ffmpeg to import and reencode a video to DELORIAN (webuseable)
    */
    private function importEpisodeVideo($episode)
    {
        $this->logbook->info('delorian.import_video_start', [], $episode->getUniqID());
        // get the video of the episode

        $video = $episode->getVideo();
        if ($video) {
            $episode->setVideo(null);
            $this->asset_service->deleteAsset($video);
        }

        $old_series = $this->flow_service->getSeries($episode->getSeries()->getUniqID());
        $old_episode = $this->flow_service->getEpisode($episode->getUniqID());
        $episode_clip = $this->flow_service->getEpisodeClip($episode->getUniqID());
        if ($episode_clip) {
            $video = $episode_clip->getClip()->getVideo();

            // use the video shortcode to find the file in the filesystem
            $adapters = [];
            $adapters['lta_lager'] = $this->adapters['lta_lager'];
            $adapters['lta_v2'] = $this->adapters['lta_v2'];
            foreach ($adapters as $key => $adapter) {
                $path = $adapter['path']."/".$old_series->getAbbrevation()."/".$video->getShortCode();
                if (file_exists($path)) {
                    //video found! all hail the flying spagetti monster!
                    $this->logbook->info('delorian.import_video_found', ['%path%' => $path], $episode->getUniqID());
                    $asset = $this->asset_service->createAsset();
                    $asset->setAdapter($this->encoding_filesystem);
                    $asset->setFilekey(uniqID().".mov");
                    $asset->setMimetype('video/quicktime');
                    $asset->setName($video->getShortCode());
                    $this->media_service->setEpisodeStatus($episode->getUniqID(), Episode::STATE_IMPORTING);

                    $command = sprintf(
                        'ffmpeg -i "%s" -deinterlace -crf 22 -movflags +faststart -acodec aac -strict -2 -vcodec h264 -r 50 -sws_flags lanczos -vf "scale=1280:720,setsar=1" "%s"',
                        $path,
                        $this->asset_service->getHelper()->getPath($asset, true)
                    );
                    print_r($command);
                    shell_exec(
                        $command
                    );
                    $episode->setVideo($asset);
                    $this->delorian_em->persist($episode);
                    $this->delorian_em->persist($asset);
                    $this->delorian_em->flush();

                    break;
                } else {
                    $this->logbook->info('delorian.import_video_not_found', ['%path%' => $path], $episode->getUniqID());
                }
            }
        }
        $this->logbook->info('delorian.import_video_end', [], $episode->getUniqID());
    }
}

?>
