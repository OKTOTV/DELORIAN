<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oktolab\MediaBundle\Entity\Episode as BaseEpisode;
use JMS\Serializer\Annotation as JMS;

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
    * @JMS\Expose
    * @JMS\ReadOnly
    */
    private $series;


    /**
     * @ManyToMany(targetEntity="Phonenumber")
     * @JoinTable(name="users_phonenumbers",
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="phonenumber_id", referencedColumnName="id", unique=true)}
     *      )
     */

    /**
     *
     * @ORM\OneToMany(targetEntity="Oktolab\MediaBundle\Entity\Media", mappedBy="episode")
     */
    private $media;

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

    /**
     * Add media
     *
     * @param \Oktolab\MediaBundle\Entity\Media $media
     * @return Episode
     */
    public function addMedia($media)
    {
        $this->media[] = $media;
        $media->setEpisode($this);
        return $this;
    }

    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * Remove media
     *
     * @param \Oktolab\MediaBundle\Entity\Media $media
     */
    public function removeMedia($media)
    {
        $this->media->removeElement($media);
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedia()
    {
        return $this->media;
    }
}
