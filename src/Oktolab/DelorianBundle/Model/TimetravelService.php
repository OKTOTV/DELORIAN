<?php

namespace Oktolab\DelorianBundle\Model;

use Oktolab\DelorianBundle\Entity\Series as DelorianSeries;
use Oktolab\DelorianBundle\Entity\Episode as DelorianEpisode;
use Oktolab\MediaBundle\Entity\Series;
use Oktolab\MediaBundle\Entity\Episode;

class TimetravelService {

    /**
    * transforms an old episode from flow to a new standartized episode for the OktolabMediaBundle.
    * kicks a worker to search and import the required data (video, posterframe)
    */
    public function timetravelEpisode(DelorianEpisode $old_episode) {

        $episode = $this->em->getRepository('OktolabMediaBundle:Episode')->findOneBy(array('uniqID' => $old_episode->getId()));
        if (!$episode) {
            $episode = new Episode();
        }
        $old_series = $old_episode->getSeries();
        $series = $this->em->getRepository('OktolabMeidaBundle:Series')->findOneBy(array('uniqID'-> $old_series->getId()));
        if (!$series) {
            $series = new Series();

        }

        $episode->setName($old_episode->getTitle());
        $episode->setDescription($old_episode->getAbstractTextPublic());
        $episode->setUniqID($old_episode->getId());
        $episode->setOnlineStart($old_episode->getOnlineStartDate());
        $episode->setOnlineEnd($old_episode->getOnlineEndDate());

        $this->addImportJob($episode);
    }

    public function timetravelSeries(DelorianSeries $series) {
    }

    /**
    * adds an importing job to the queue to import posterframes and videos
    */
    public function addImportJob() {

    }
}


?>
