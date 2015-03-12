<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EpisodeClip
 *
 * @ORM\Table(name="episode_clip", indexes={@ORM\Index(name="episode_clip_FI_1", columns={"episode_id"}), @ORM\Index(name="episode_clip_FI_2", columns={"clip_id"})})
 * @ORM\Entity
 */
class EpisodeClip
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @var \Episode
     *
     * @ORM\ManyToOne(targetEntity="Episode")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="episode_id", referencedColumnName="id")
     * })
     */
    private $episode;

    /**
     * @var \Clip
     *
     * @ORM\ManyToOne(targetEntity="Clip")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clip_id", referencedColumnName="id")
     * })
     */
    private $clip;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return EpisodeClip
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set episode
     *
     * @param \Oktolab\DelorianBundle\Entity\Episode $episode
     * @return EpisodeClip
     */
    public function setEpisode(\Oktolab\DelorianBundle\Entity\Episode $episode = null)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return \Oktolab\DelorianBundle\Entity\Episode 
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Set clip
     *
     * @param \Oktolab\DelorianBundle\Entity\Clip $clip
     * @return EpisodeClip
     */
    public function setClip(\Oktolab\DelorianBundle\Entity\Clip $clip = null)
    {
        $this->clip = $clip;

        return $this;
    }

    /**
     * Get clip
     *
     * @return \Oktolab\DelorianBundle\Entity\Clip 
     */
    public function getClip()
    {
        return $this->clip;
    }
}
