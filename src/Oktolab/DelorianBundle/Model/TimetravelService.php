<?php

namespace Oktolab\DelorianBundle\Model;

class TimetravelService {

    private $flow_service;
    private $delorian_em;
    private $adapters;
    private $jobservice;
    private $episode_class;
    private $series_class;
    private $worker_queue;
    private $asset_service;

    public function __construct($flow_service, $delorian_manager, $adapters, $jobservice, $episode_class, $series_class, $worker_queue, $asset_service) {
        $this->adapters = $adapters;
        $this->flow_service = $flow_service;
        $this->delorian_em = $delorian_manager;
        $this->jobservice = $jobservice;
        $this->episode_class = $episode_class;
        $this->series_class = $series_class;
        $this->worker_queue = $worker_queue;
        $this->asset_service = $asset_service;
    }

    /**
    * adds timetraveljob for given episode id
    */
    public function fluxCompensateEpisode($id) {
        $this->jobservice->addJob("Oktolab\DelorianBundle\Model\TimetravelJob", array('type' => 'episode', 'id' => $id), $this->worker_queue);
    }

    /**
    * adds timetraveljob for all episodes of a series
    */
    public function fluxCompensateSeriesEpisodes($id) {
        $old_episodes = $this->flow_service->getEpisodes($id); //$this->flow_em->getRepository('OktolabDelorianBundle:Episode')->findBy(array('series' => $id));
        foreach ($old_episodes as $episode) {
            $this->jobservice->addJob("Oktolab\DelorianBundle\Model\TimetravelJob", array('type' => 'episode', 'id' => $episode->getId()), $this->worker_queue);
        }
    }

    /**
    * adds timetraveljob for given series id
    */
    public function fluxCompensateSeries($id) {
        $this->jobservice->addJob("Oktolab\DelorianBundle\Model\TimetravelJob", array('type' => 'series', 'id' => $id), $this->worker_queue);
    }

    /**
    * transforms an old episode from flow to a new standartized episode for the OktolabMediaBundle.
    * kicks a worker to search and import the required data (video, posterframe)
    */
    public function timetravelEpisode($id) {
        echo "import episode ".$id."\n";
        $old_episode = $this->flow_service->getEpisode($id);
        if ($old_episode) {
            $episode = $this->delorian_em->getRepository($this->episode_class)->findOneBy(array('uniqID' => $old_episode->getId()));
            if (!$episode) {
                $episode = new $this->episode_class;
            }
            $old_series = $old_episode->getSeries();
            $series = $this->delorian_em->getRepository($this->series_class)->findOneBy(array('uniqID' => $old_series->getId()));
            if (!$series) {
                $series = new $this->series_class;
            }
                $series->setUniqID($old_series->getId());
                $series->setName($old_series->getTitle());
                $series->setWebTitle($old_series->getWebAbbrevation());
                $series->setDescription($old_series->getAbstractTextPublic());
                $this->importSeriesPosterframe($series);

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
            // $this->flow_em->clear();
            if ($episode->getVideo()) {
                $this->jobservice->addJob("Oktolab\MediaBundle\Model\EncodeVideoJob", ['uniqID' => $episode->getUniqID()]);
            }
            // unset($episode);
            // unset($series);
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
    private function importEpisodePosterframe($episode)
    {
        $attachment = $this->flow_service->getAttachment($episode);
        if ($attachment) {
            // decode blob and save as file to the filesystem
            $name = uniqID();
            // $adapter = new LocalAdapter($this->adapters['gallery']['path']);
            // $filesystem = new Filesystem($adapter);
            // $filesystem->write($name, stream_get_contents($attachment->getContent()));
            // unset($adapter);
            // unset($filesystem);
            //add posterframe as Asset to the Episode!
            $asset = $this->asset_service->createAsset();
            $asset->setFilekey($name);
            $asset->setAdapter('posterframe');
            $asset->setName($attachment->getFileName());
            $asset->setFileSize($attachment->getFileSize());
            $asset->setMimetype($attachment->getMimetype());

            $filesystem = $this->asset_service->getHelper()->getFilesystem($asset->getAdapter());
            $filesystem->write($asset->getFilekey(), $attachment->getContent());

            if ($episode->getPosterframe()) {
                $this->asset_service->deleteAsset($episode->getPosterframe());
            }

            $episode->setPosterframe($asset);
            $this->delorian_em->persist($asset);
        }
        // unset($attachmentObject);
        // unset($attachment);
    }

    private function importSeriesPosterframe($series)
    {
        $attachment = $this->flow_service->getSeriesAttachment($series);
        if ($attachment) {
            // decode blob and save as file to the filesystem
            $name = uniqID();
            // $adapter = new LocalAdapter($this->adapters['gallery']['path']);
            // $filesystem = new Filesystem($adapter);
            // $filesystem->write($name, stream_get_contents($attachment->getContent()));
            // unset($adapter);
            // unset($filesystem);
            //add posterframe as Asset to the Episode!
            $asset = $this->asset_service->createAsset();
            $asset->setFilekey($name);
            $asset->setAdapter('posterframe');
            $asset->setName($attachment->getFileName());
            $asset->setFileSize($attachment->getFileSize());
            $asset->setMimetype($attachment->getMimetype());

            $filesystem = $this->asset_service->getHelper()->getFilesystem($asset->getAdapter());
            $filesystem->write($asset->getFilekey(), $attachment->getContent());

            // delete old posterframe
            if ($series->getPosterframe()) {
                $this->asset_service->deleteAsset($series->getPosterframe());
            }
            $series->setPosterframe($asset);
            $this->delorian_em->persist($asset);
        }
        // unset($attachmentObject);
        // unset($attachment);
    }

    /**
    * uses ffmpeg to import and reencode a video to DELORIAN (webuseable)
    */
    private function importEpisodeVideo($episode)
    {
        // get the video of the episode
        $old_series = $this->flow_service->getSeries($episode->getSeries()->getUniqID()); //$this->flow_em->getRepository('OktolabDelorianBundle:Series')->findOneBy(array('id' => $episode->getSeries()->getUniqID()));
        $old_episode = $this->flow_service->getEpisode($episode->getUniqID()); //$this->flow_em->getRepository('OktolabDelorianBundle:Episode')->findOneBy(array('id' => $episode->getUniqID()));
        $episode_clip = $this->flow_service->getEpisodeClip($episode->getUniqID()); //$this->flow_em->getRepository('OktolabDelorianBundle:EpisodeClip')->findOneBy(array('episode' => $episode->getUniqID()));
        if ($episode_clip) {
            $video = $episode_clip->getClip()->getVideo();

            // use the video shortcode to find the file in the filesystem
            foreach ($this->adapters as $key => $adapter) {
                $path = $adapter['path'].'/'.$old_series->getAbbrevation().'/'.$video->getShortCode();
                if (file_exists($path)) {
                    //video found! all hail the flying spagetti monster!
                    echo "found video ".$path."\n";
                    //if path is LTA, use own encode Video job to scale 720x576 videos to HD ready!
                    $this->encodeVideo($path, $video->getShortCode(), $episode);

                    break;
                }
            }
        }

    }

    /**
    * ffmpeg command to encode video to delorian
    */
    private function encodeVideo($path, $filename, $episode) {
        $key = uniqID().".mov";
        $asset = $this->asset_service->createAsset();
        $asset->setFilekey($key);
        $asset->setAdapter('video');
        $asset->setName($filename);
        $asset->setMimetype('video/quicktime');
        $episode->setVideo($asset);
        $this->delorian_em->persist($asset);
        $this->delorian_em->persist($episode);
        $this->delorian_em->flush();
        echo "start encoding \n";
        shell_exec(sprintf('ffmpeg -i "%s" -deinterlace -crf 21 -s 1280x720 -movflags +faststart -acodec aac -strict -2 -vcodec h264 -r 50 "%s"', $path, $this->asset_service->getHelper()->getPath($asset)));
    }
}

?>
