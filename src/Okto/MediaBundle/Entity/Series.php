<?php

namespace Okto\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oktolab\MediaBundle\Entity\Series as BaseSeries;
use JMS\Serializer\Annotation as JMS;

/**
 * Series
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Series extends BaseSeries
{

        /**
        * @JMS\Expose
        * @JMS\ReadOnly
        * @JMS\MaxDepth(1)
        * @ORM\OneToMany(targetEntity="Episode", mappedBy="series")
        */
        private $episodes;

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
}
