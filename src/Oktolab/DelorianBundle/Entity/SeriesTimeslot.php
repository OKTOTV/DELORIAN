<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeriesTimeslot
 *
 * @ORM\Table(name="series_timeslot", indexes={@ORM\Index(name="series_timeslot_FI_1", columns={"contract_id"}), @ORM\Index(name="series_timeslot_FI_2", columns={"frequency_type_id"})})
 * @ORM\Entity
 */
class SeriesTimeslot
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
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_episodes", type="integer", nullable=true)
     */
    private $maxEpisodes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="airtime", type="time", nullable=false)
     */
    private $airtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer", nullable=false)
     */
    private $length;

    /**
     * @var integer
     *
     * @ORM\Column(name="weekdays", type="bigint", nullable=true)
     */
    private $weekdays = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="frequency", type="integer", nullable=true)
     */
    private $frequency = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="month_day", type="string", length=10, nullable=true)
     */
    private $monthDay = 'first';

    /**
     * @var boolean
     *
     * @ORM\Column(name="month_weekday", type="boolean", nullable=true)
     */
    private $monthWeekday = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="available_plans_count", type="integer", nullable=true)
     */
    private $availablePlansCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="repetition_weight", type="integer", nullable=false)
     */
    private $repetitionWeight = '100';

    /**
     * @var integer
     *
     * @ORM\Column(name="repetition_min_days", type="integer", nullable=false)
     */
    private $repetitionMinDays = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="repetition_max_days", type="integer", nullable=false)
     */
    private $repetitionMaxDays = '30';

    /**
     * @var integer
     *
     * @ORM\Column(name="repetition_max_per_episode", type="integer", nullable=true)
     */
    private $repetitionMaxPerEpisode = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="repetition_weekdays", type="bigint", nullable=true)
     */
    private $repetitionWeekdays = '127';

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

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
     * @var \Contract
     *
     * @ORM\ManyToOne(targetEntity="Contract")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contract_id", referencedColumnName="id")
     * })
     */
    private $contract;

    /**
     * @var \FrequencyType
     *
     * @ORM\ManyToOne(targetEntity="FrequencyType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="frequency_type_id", referencedColumnName="id")
     * })
     */
    private $frequencyType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="DayTime", inversedBy="seriesTimeslot")
     * @ORM\JoinTable(name="series_timeslot_day_time",
     *   joinColumns={
     *     @ORM\JoinColumn(name="series_timeslot_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="day_time_id", referencedColumnName="id")
     *   }
     * )
     */
    private $dayTime;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dayTime = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set active
     *
     * @param boolean $active
     * @return SeriesTimeslot
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return SeriesTimeslot
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return SeriesTimeslot
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set maxEpisodes
     *
     * @param integer $maxEpisodes
     * @return SeriesTimeslot
     */
    public function setMaxEpisodes($maxEpisodes)
    {
        $this->maxEpisodes = $maxEpisodes;

        return $this;
    }

    /**
     * Get maxEpisodes
     *
     * @return integer 
     */
    public function getMaxEpisodes()
    {
        return $this->maxEpisodes;
    }

    /**
     * Set airtime
     *
     * @param \DateTime $airtime
     * @return SeriesTimeslot
     */
    public function setAirtime($airtime)
    {
        $this->airtime = $airtime;

        return $this;
    }

    /**
     * Get airtime
     *
     * @return \DateTime 
     */
    public function getAirtime()
    {
        return $this->airtime;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return SeriesTimeslot
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set weekdays
     *
     * @param integer $weekdays
     * @return SeriesTimeslot
     */
    public function setWeekdays($weekdays)
    {
        $this->weekdays = $weekdays;

        return $this;
    }

    /**
     * Get weekdays
     *
     * @return integer 
     */
    public function getWeekdays()
    {
        return $this->weekdays;
    }

    /**
     * Set frequency
     *
     * @param integer $frequency
     * @return SeriesTimeslot
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return integer 
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set monthDay
     *
     * @param string $monthDay
     * @return SeriesTimeslot
     */
    public function setMonthDay($monthDay)
    {
        $this->monthDay = $monthDay;

        return $this;
    }

    /**
     * Get monthDay
     *
     * @return string 
     */
    public function getMonthDay()
    {
        return $this->monthDay;
    }

    /**
     * Set monthWeekday
     *
     * @param boolean $monthWeekday
     * @return SeriesTimeslot
     */
    public function setMonthWeekday($monthWeekday)
    {
        $this->monthWeekday = $monthWeekday;

        return $this;
    }

    /**
     * Get monthWeekday
     *
     * @return boolean 
     */
    public function getMonthWeekday()
    {
        return $this->monthWeekday;
    }

    /**
     * Set availablePlansCount
     *
     * @param integer $availablePlansCount
     * @return SeriesTimeslot
     */
    public function setAvailablePlansCount($availablePlansCount)
    {
        $this->availablePlansCount = $availablePlansCount;

        return $this;
    }

    /**
     * Get availablePlansCount
     *
     * @return integer 
     */
    public function getAvailablePlansCount()
    {
        return $this->availablePlansCount;
    }

    /**
     * Set repetitionWeight
     *
     * @param integer $repetitionWeight
     * @return SeriesTimeslot
     */
    public function setRepetitionWeight($repetitionWeight)
    {
        $this->repetitionWeight = $repetitionWeight;

        return $this;
    }

    /**
     * Get repetitionWeight
     *
     * @return integer 
     */
    public function getRepetitionWeight()
    {
        return $this->repetitionWeight;
    }

    /**
     * Set repetitionMinDays
     *
     * @param integer $repetitionMinDays
     * @return SeriesTimeslot
     */
    public function setRepetitionMinDays($repetitionMinDays)
    {
        $this->repetitionMinDays = $repetitionMinDays;

        return $this;
    }

    /**
     * Get repetitionMinDays
     *
     * @return integer 
     */
    public function getRepetitionMinDays()
    {
        return $this->repetitionMinDays;
    }

    /**
     * Set repetitionMaxDays
     *
     * @param integer $repetitionMaxDays
     * @return SeriesTimeslot
     */
    public function setRepetitionMaxDays($repetitionMaxDays)
    {
        $this->repetitionMaxDays = $repetitionMaxDays;

        return $this;
    }

    /**
     * Get repetitionMaxDays
     *
     * @return integer 
     */
    public function getRepetitionMaxDays()
    {
        return $this->repetitionMaxDays;
    }

    /**
     * Set repetitionMaxPerEpisode
     *
     * @param integer $repetitionMaxPerEpisode
     * @return SeriesTimeslot
     */
    public function setRepetitionMaxPerEpisode($repetitionMaxPerEpisode)
    {
        $this->repetitionMaxPerEpisode = $repetitionMaxPerEpisode;

        return $this;
    }

    /**
     * Get repetitionMaxPerEpisode
     *
     * @return integer 
     */
    public function getRepetitionMaxPerEpisode()
    {
        return $this->repetitionMaxPerEpisode;
    }

    /**
     * Set repetitionWeekdays
     *
     * @param integer $repetitionWeekdays
     * @return SeriesTimeslot
     */
    public function setRepetitionWeekdays($repetitionWeekdays)
    {
        $this->repetitionWeekdays = $repetitionWeekdays;

        return $this;
    }

    /**
     * Get repetitionWeekdays
     *
     * @return integer 
     */
    public function getRepetitionWeekdays()
    {
        return $this->repetitionWeekdays;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return SeriesTimeslot
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return SeriesTimeslot
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
     * @return SeriesTimeslot
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
     * Set contract
     *
     * @param \Oktolab\DelorianBundle\Entity\Contract $contract
     * @return SeriesTimeslot
     */
    public function setContract(\Oktolab\DelorianBundle\Entity\Contract $contract = null)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get contract
     *
     * @return \Oktolab\DelorianBundle\Entity\Contract 
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Set frequencyType
     *
     * @param \Oktolab\DelorianBundle\Entity\FrequencyType $frequencyType
     * @return SeriesTimeslot
     */
    public function setFrequencyType(\Oktolab\DelorianBundle\Entity\FrequencyType $frequencyType = null)
    {
        $this->frequencyType = $frequencyType;

        return $this;
    }

    /**
     * Get frequencyType
     *
     * @return \Oktolab\DelorianBundle\Entity\FrequencyType 
     */
    public function getFrequencyType()
    {
        return $this->frequencyType;
    }

    /**
     * Add dayTime
     *
     * @param \Oktolab\DelorianBundle\Entity\DayTime $dayTime
     * @return SeriesTimeslot
     */
    public function addDayTime(\Oktolab\DelorianBundle\Entity\DayTime $dayTime)
    {
        $this->dayTime[] = $dayTime;

        return $this;
    }

    /**
     * Remove dayTime
     *
     * @param \Oktolab\DelorianBundle\Entity\DayTime $dayTime
     */
    public function removeDayTime(\Oktolab\DelorianBundle\Entity\DayTime $dayTime)
    {
        $this->dayTime->removeElement($dayTime);
    }

    /**
     * Get dayTime
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDayTime()
    {
        return $this->dayTime;
    }
}
