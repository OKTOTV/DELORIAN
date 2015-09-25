<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oktolab\MediaBundle\Entity\Episode as BaseEpisode;

/**
 * Episode
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Episode extends BaseEpisode
{

    /**
    * @ORM\ManyToOne(targetEntity="Series", inversedBy="episodes", cascade={"persist"})
    */
    private $series;

    /**
     * Set series
     *
     * @param \Oktolab\MediaBundle\Entity\Series $series
     * @return Episode
     */
    public function setSeries(\Oktolab\MediaBundle\Entity\Series $series = null)
    {
        $this->series = $series;
        return $this;
    }

    /**
     * Get series
     *
     * @return \Oktolab\MediaBundle\Entity\Series
     */
    public function getSeries()
    {
        return $this->series;
    }
}
