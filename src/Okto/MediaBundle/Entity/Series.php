<?php

namespace Okto\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oktolab\MediaBundle\Entity\Series as BaseSeries;
use JMS\Serializer\Annotation as JMS;

/**
 * Series
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Okto\MediaBundle\Entity\Repository\SeriesRepository")
 */
class Series extends BaseSeries
{
        const IMPORT_PROGRESS_FRESH = 0;
        const IMPORT_PROGRESS_IN_WORK = 10;
        const IMPORT_PROGRESS_FINISHED = 20;

        /**
        * @JMS\Expose
        * @JMS\ReadOnly
        * @JMS\MaxDepth(1)
        * @ORM\OneToMany(targetEntity="Episode", mappedBy="series")
        */
        private $episodes;

        /**
         * @ORM\Column(type="integer", options={"default"="0"})
         */
        private $importProgress;

        public function __construct()
        {
            parent::__construct();
            $this->importProgress = 0;
        }

        /**
         * Add episodes
         *
         * @param \Oktolab\MediaBundle\Entity\Episode $episodes
         * @return Series
         */
        public function addEpisode($episodes)
        {
            $this->episodes[] = $episodes;
            return $this;
        }

        /**
         * Remove episodes
         *
         * @param \Oktolab\MediaBundle\Entity\Episode $episodes
         */
        public function removeEpisode($episodes)
        {
            $this->episodes->removeElement($episodes);
        }

        /**
         * Get episodes
         *
         * @return \Doctrine\Common\Collections\Collection
         */
        public function getEpisodes()
        {
            return $this->episodes;
        }

        public function setEpisodes($episodes = null)
        {
            $this->episodes = $episodes;
            return $this;
        }

        public function setImportProgress($value)
        {
            $this->importProgress = $value;
            return $this;
        }

        public function getImportProgress()
        {
            return $this->importProgress;
        }
}
