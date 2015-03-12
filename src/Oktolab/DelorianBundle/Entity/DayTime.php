<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DayTime
 *
 * @ORM\Table(name="day_time", uniqueConstraints={@ORM\UniqueConstraint(name="day_time_U_1", columns={"name"})})
 * @ORM\Entity
 */
class DayTime
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="start_time", type="integer", nullable=true)
     */
    private $startTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="end_time", type="integer", nullable=true)
     */
    private $endTime;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SeriesTimeslot", mappedBy="dayTime")
     */
    private $seriesTimeslot;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->seriesTimeslot = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return DayTime
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return DayTime
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set startTime
     *
     * @param integer $startTime
     * @return DayTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return integer 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param integer $endTime
     * @return DayTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return integer 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Add seriesTimeslot
     *
     * @param \Oktolab\DelorianBundle\Entity\SeriesTimeslot $seriesTimeslot
     * @return DayTime
     */
    public function addSeriesTimeslot(\Oktolab\DelorianBundle\Entity\SeriesTimeslot $seriesTimeslot)
    {
        $this->seriesTimeslot[] = $seriesTimeslot;

        return $this;
    }

    /**
     * Remove seriesTimeslot
     *
     * @param \Oktolab\DelorianBundle\Entity\SeriesTimeslot $seriesTimeslot
     */
    public function removeSeriesTimeslot(\Oktolab\DelorianBundle\Entity\SeriesTimeslot $seriesTimeslot)
    {
        $this->seriesTimeslot->removeElement($seriesTimeslot);
    }

    /**
     * Get seriesTimeslot
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeriesTimeslot()
    {
        return $this->seriesTimeslot;
    }
}
