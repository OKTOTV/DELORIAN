<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BroadcastEpisodeItem
 *
 * @ORM\Table(name="broadcast_episode_item", uniqueConstraints={@ORM\UniqueConstraint(name="broadcast_episode_item_U_1", columns={"broadcast_item_id"})}, indexes={@ORM\Index(name="broadcast_episode_item_FI_1", columns={"episode_id"}), @ORM\Index(name="broadcast_episode_item_FI_2", columns={"series_id"}), @ORM\Index(name="broadcast_episode_item_FI_5", columns={"series_timeslot_id"}), @ORM\Index(name="broadcast_episode_item_FI_6", columns={"is_repetition_of"})})
 * @ORM\Entity
 */
class BroadcastEpisodeItem
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
     * @var \DateTime
     *
     * @ORM\Column(name="timeslot_airtime", type="datetime", nullable=true)
     */
    private $timeslotAirtime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="force_repetition", type="boolean", nullable=true)
     */
    private $forceRepetition = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

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
     * @var \Series
     *
     * @ORM\ManyToOne(targetEntity="Series")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="series_id", referencedColumnName="id")
     * })
     */
    private $series;

    /**
     * @var \BroadcastItem
     *
     * @ORM\ManyToOne(targetEntity="BroadcastItem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="broadcast_item_id", referencedColumnName="id")
     * })
     */
    private $broadcastItem;

    /**
     * @var \SeriesTimeslot
     *
     * @ORM\ManyToOne(targetEntity="SeriesTimeslot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="series_timeslot_id", referencedColumnName="id")
     * })
     */
    private $seriesTimeslot;

    /**
     * @var \BroadcastItem
     *
     * @ORM\ManyToOne(targetEntity="BroadcastItem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="is_repetition_of", referencedColumnName="id")
     * })
     */
    private $isRepetitionOf;



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
     * Set timeslotAirtime
     *
     * @param \DateTime $timeslotAirtime
     * @return BroadcastEpisodeItem
     */
    public function setTimeslotAirtime($timeslotAirtime)
    {
        $this->timeslotAirtime = $timeslotAirtime;

        return $this;
    }

    /**
     * Get timeslotAirtime
     *
     * @return \DateTime 
     */
    public function getTimeslotAirtime()
    {
        return $this->timeslotAirtime;
    }

    /**
     * Set forceRepetition
     *
     * @param boolean $forceRepetition
     * @return BroadcastEpisodeItem
     */
    public function setForceRepetition($forceRepetition)
    {
        $this->forceRepetition = $forceRepetition;

        return $this;
    }

    /**
     * Get forceRepetition
     *
     * @return boolean 
     */
    public function getForceRepetition()
    {
        return $this->forceRepetition;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BroadcastEpisodeItem
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return BroadcastEpisodeItem
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set episode
     *
     * @param \Oktolab\DelorianBundle\Entity\Episode $episode
     * @return BroadcastEpisodeItem
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
     * Set series
     *
     * @param \Oktolab\DelorianBundle\Entity\Series $series
     * @return BroadcastEpisodeItem
     */
    public function setSeries(\Oktolab\DelorianBundle\Entity\Series $series = null)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return \Oktolab\DelorianBundle\Entity\Series 
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set broadcastItem
     *
     * @param \Oktolab\DelorianBundle\Entity\BroadcastItem $broadcastItem
     * @return BroadcastEpisodeItem
     */
    public function setBroadcastItem(\Oktolab\DelorianBundle\Entity\BroadcastItem $broadcastItem = null)
    {
        $this->broadcastItem = $broadcastItem;

        return $this;
    }

    /**
     * Get broadcastItem
     *
     * @return \Oktolab\DelorianBundle\Entity\BroadcastItem 
     */
    public function getBroadcastItem()
    {
        return $this->broadcastItem;
    }

    /**
     * Set seriesTimeslot
     *
     * @param \Oktolab\DelorianBundle\Entity\SeriesTimeslot $seriesTimeslot
     * @return BroadcastEpisodeItem
     */
    public function setSeriesTimeslot(\Oktolab\DelorianBundle\Entity\SeriesTimeslot $seriesTimeslot = null)
    {
        $this->seriesTimeslot = $seriesTimeslot;

        return $this;
    }

    /**
     * Get seriesTimeslot
     *
     * @return \Oktolab\DelorianBundle\Entity\SeriesTimeslot 
     */
    public function getSeriesTimeslot()
    {
        return $this->seriesTimeslot;
    }

    /**
     * Set isRepetitionOf
     *
     * @param \Oktolab\DelorianBundle\Entity\BroadcastItem $isRepetitionOf
     * @return BroadcastEpisodeItem
     */
    public function setIsRepetitionOf(\Oktolab\DelorianBundle\Entity\BroadcastItem $isRepetitionOf = null)
    {
        $this->isRepetitionOf = $isRepetitionOf;

        return $this;
    }

    /**
     * Get isRepetitionOf
     *
     * @return \Oktolab\DelorianBundle\Entity\BroadcastItem 
     */
    public function getIsRepetitionOf()
    {
        return $this->isRepetitionOf;
    }
}
