<?php

namespace Oktolab\DelorianBundle\Model;

use Oktolab\DelorianBundle\Entity\Series as DelorianSeries;
use Oktolab\DelorianBundle\Entity\Episode as DelorianEpisode;
use AppBundle\Entity\Series;
use AppBundle\Entity\Episode;
use Gaufrette\Filesystem;
use Gaufrette\Adapter\Local as LocalAdapter;
use Gaufrette\File;
use AppBundle\Entity\Asset;

class TimetravelService {

    private $flow_em;
    private $delorian_em;
    private $adapters;
    private $jobservice;
    private $episode_class;
    private $series_class;
    private $asset_class;
    private $worker_queue;
    private $guzzle_client;

    public function __construct($flow_manager, $delorian_manager, $adapters, $jobservice, $episode_class, $series_class, $asset_class, $worker_queue, $guzzle_client) {
        $this->adapters = $adapters;
        $this->flow_em = $flow_manager;
        $this->delorian_em = $delorian_manager;
        $this->jobservice = $jobservice;
        $this->episode_class = $episode_class;
        $this->series_class = $series_class;
        $this->asset_class = $asset_class;
        $this->worker_queue = $worker_queue;
        $this->guzzle_client = $guzzle_client;
    }

    /**
    * adds timetraveljob for given episode id
    */
    public function fluxCompensateEpisode($id)
    {
        $this->jobservice->addJob("Oktolab\DelorianBundle\Model\TimetravelJob", array('type' => 'episode', 'id' => $id), $this->worker_queue);
    }

    /**
    * adds timetraveljob for all episodes of a series
    */
    public function fluxCompensateSeriesEpisodes($id)
    {
        $old_episodes = $this->flow_em->getRepository('OktolabDelorianBundle:Episode')->findBy(array('series' => $id));
        foreach ($old_episodes as $episode) {
            $this->jobservice->addJob("Oktolab\DelorianBundle\Model\TimetravelJob", array('type' => 'episode', 'id' => $episode->getId()), $this->worker_queue);
        }
    }

    /**
    * adds timetraveljob for given series id
    */
    public function fluxCompensateSeries($id)
    {
        $this->jobservice->addJob("Oktolab\DelorianBundle\Model\TimetravelJob", array('type' => 'series', 'id' => $id), $this->worker_queue);
    }

    /**
    * transforms an old episode from flow to a new standartized episode for the OktolabMediaBundle.
    * kicks a worker to search and import the required data (video, posterframe)
    */
    public function timetravelEpisode($id) {
        echo "import episode ".$id."\n";
        $old_episode = $this->flow_em->getRepository('OktolabDelorianBundle:Episode')->findOneBy(array('id' => $id));

            $episode = $this->delorian_em->getRepository($this->episode_class)->findOneBy(array('uniqID' => $old_episode->getId()));
            if (!$episode) {
                $episode = new $this->episode_class;
            }
            $old_series = $old_episode->getSeries();
            $series = $this->delorian_em->getRepository($this->series_class)->findOneBy(array('uniqID' => $old_series->getId()));
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
                $episodeclips = $this->flow_em->getRepository('OktolabDelorianBundle:EpisodeClip')->findBy(array('episode' => $old_episode->getId()));
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
            $episode->setSeries($series);

            $this->importEpisodePosterframe($episode);
            $this->importEpisodeVideo($episode);

            $this->delorian_em->persist($episode);
            $this->delorian_em->persist($series);
            $this->delorian_em->flush();
            $this->delorian_em->clear();
            $this->flow_em->clear();
            unset($episode);
            unset($series);
    }

    public function timetravelSeries($id) {
        $old_series = $this->flow_em->getRepository('OktolabDelorianBundle:Series')->findBy(array('id' => $id));
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
    private function importEpisodePosterframe(Episode $episode)
    {
        $attachmentObject = $this->flow_em->getRepository('OktolabDelorianBundle:AttachmentObject')->findOneBy(array('reference' => $episode->getUniqID()));
        if ($attachmentObject) {
            $attachment = $this->flow_em->getRepository('OktolabDelorianBundle:Attachment')->findOneBy(array('attachmentObject' => $attachmentObject->getId(), 'attachmentRole' => 3));
            if (!$attachment) { //not an episode posterframe, search the clip posteframe -.-
                $episodeclips = $this->flow_em->getRepository('OktolabDelorianBundle:EpisodeClip')->findBy(array('episode' => $episode->getUniqID()));
                if ($episodeclips) {
                    $attachmentObject = $this->flow_em->getRepository('OktolabDelorianBundle:AttachmentObject')->findOneBy(array('reference' => $episodeclips[0]->getClip()->getId()));
                    if ($attachmentObject) {
                        $attachment = $attachment = $this->flow_em->getRepository('OktolabDelorianBundle:Attachment')->findOneBy(array('attachmentObject' => $attachmentObject->getId(), 'attachmentRole' => 4));
                    }
                }
            }
            if ($attachment) {
                // decode blob and save as file to the filesystem
                $name = uniqID();
                $adapter = new LocalAdapter($this->adapters['gallery']['path']);
                $filesystem = new Filesystem($adapter);
                $filesystem->write($name, stream_get_contents($attachment->getContent()));
                unset($adapter);
                unset($filesystem);
                //add posterframe as Asset to the Episode!
                $asset = new $this->asset_class;
                $asset->setKey($name);
                $asset->setAdapter('gallery');
                $asset->setName($attachment->getFileName());
                $asset->setFileSize($attachment->getFileSize());
                $asset->setMimetype($attachment->getMimetype());

                $episode->setPosterframe($asset);
                $this->delorian_em->persist($asset);
            }
        }
        unset($attachmentObject);
        unset($attachment);
    }

    private function importSeriesPosterframe(Series $series)
    {
        $attachmentObject = $this->flow_em->getRepository('OktolabDelorianBundle:AttachmentObject')->findOneBy(array('reference' => $series->getUniqID()));
        if ($attachmentObject) {
            $attachment = $this->flow_em->getRepository('OktolabDelorianBundle:Attachment')->findOneBy(array('attachmentObject' => $attachmentObject->getId(), 'attachmentRole' => 2));
            if ($attachment) {
                // decode blob and save as file to the filesystem
                $name = uniqID();
                $adapter = new LocalAdapter($this->adapters['gallery']['path']);
                $filesystem = new Filesystem($adapter);
                $filesystem->write($name, stream_get_contents($attachment->getContent()));
                unset($adapter);
                unset($filesystem);
                //add posterframe as Asset to the Episode!
                $asset = new Asset();
                $asset->setKey($name);
                $asset->setAdapter('gallery');
                $asset->setName($attachment->getFileName());
                $asset->setFileSize($attachment->getFileSize());
                $asset->setMimetype($attachment->getMimetype());

                $series->setPosterframe($asset);
                $this->delorian_em->persist($asset);
            }
        }
        unset($attachmentObject);
        unset($attachment);
    }

    /**
    * uses ffmpeg to import and reencode a video to DELORIAN (webuseable)
    */
    private function importEpisodeVideo(Episode $episode)
    {
        // get the video of the episode
        $old_series = $this->flow_em->getRepository('OktolabDelorianBundle:Series')->findOneBy(array('id' => $episode->getSeries()->getUniqID()));
        $old_episode = $this->flow_em->getRepository('OktolabDelorianBundle:Episode')->findOneBy(array('id' => $episode->getUniqID()));
        $episode_clip = $this->flow_em->getRepository('OktolabDelorianBundle:EpisodeClip')->findOneBy(array('episode' => $episode->getUniqID()));
        if ($episode_clip) {
            $video = $episode_clip->getClip()->getVideo();

            // use the video shortcode to find the file in the filesystem
            $gaufretteAdapters = array();
            foreach ($this->adapters as $key => $adapter) {
                $path = $adapter['path'].'/'.$old_series->getAbbrevation().'/'.$video->getShortCode();
                if (file_exists($path)) {
                    //video found! all hail the flying spagetti monster!
                    echo "found video ".$path."\n";
                    //TODO: if path is LTA, use own encode Video job to scale 720x576 videos to HD ready!
                    $this->encodeVideo($path, $video->getShortCode(), $episode);
                    break;
                }
            }
        }

    }

    /**
    * ffmpeg command to encode video to delorian
    */
    private function encodeVideo($path, $filename, Episode $episode) {
        $key = uniqID().".mov";
        $asset = new $this->asset_class;
        $asset->setKey($key);
        $asset->setAdapter('video');
        $asset->setName($filename);
        $asset->setMimetype('video/quicktime');
        $episode->setVideo($asset);
        $this->delorian_em->persist($asset);
        $this->delorian_em->persist($episode);
        $this->delorian_em->flush();
        echo "start encoding \n";
        shell_exec(sprintf('ffmpeg -i "%s" -deinterlace -crf 21 -s 1280x720 -movflags +faststart -acodec aac -strict -2 -vcodec h264 -r 50 "%s"', $path, $this->adapters['video']['path'].'/'.$key));
    }

    public function parseProgram(\Datetime $start, \Datetime $end)
    {
        $program = array();

        $response = $this->guzzle_client->get($this->getProgrammweekURLforDate($start));
        if ($response->getStatusCode() == 200) {
            $xml = new \SimpleXMLElement($response->getBody());
            foreach($xml->show as $xml_show) {
                // die(var_dump(new \Datetime((string)$xml_show['airdate']) < $start));
                if (new \Datetime((string)$xml_show['airdate']) < $start || new \Datetime((string)$xml_show['airdate']) > $end ) {
                    continue;
                }
                $show = array();
                $show['airdate'] = (string)$xml_show['airdate'];
                $show['uniqID'] = (string)$xml_show['clip_id'];
                $show['name'] = (string)$xml_show['title'];
                $show['description'] = (string)$xml_show['content'] == "" ? (string)$xml_show['series_promotext'] : (string)$xml_show['content'];
                $show['series_name'] = (string)$xml_show['sendungsname'];
                $show['repetitions'] = array();
                foreach($xml_show->repetitions->repetition as $xml_repetition) {
                    $show['repetitions'][] = (string)$xml_repetition['airtime'];
                }
                $program[] = $show;
            }
        }
        return $program;
    }

    private function getProgrammweekURLforDate(\Datetime $current)
    {
        $start = clone $current;
        $date = $start->modify(sprintf('-%s days', $start->format('N')-1));
        //die(var_dump(sprintf('http://api.okto.tv/program_weeks/website_week_%s.xml', $date->format('Y-m-d'))));
        return sprintf('http://api.okto.tv/program_weeks/website_week_%s.xml', $date->format('Y-m-d'));
    }
}

?>
