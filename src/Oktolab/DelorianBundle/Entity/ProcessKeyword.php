<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcessKeyword
 *
 * @ORM\Table(name="process_keyword")
 * @ORM\Entity
 */
class ProcessKeyword
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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     */
    private $weight = '100';

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Clip", mappedBy="processKeyword")
     */
    private $clip;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Series", mappedBy="processKeyword")
     */
    private $series;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clip = new \Doctrine\Common\Collections\ArrayCollection();
        $this->series = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return ProcessKeyword
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
     * Set weight
     *
     * @param integer $weight
     * @return ProcessKeyword
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ProcessKeyword
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
     * @return ProcessKeyword
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
     * Add clip
     *
     * @param \Oktolab\DelorianBundle\Entity\Clip $clip
     * @return ProcessKeyword
     */
    public function addClip(\Oktolab\DelorianBundle\Entity\Clip $clip)
    {
        $this->clip[] = $clip;

        return $this;
    }

    /**
     * Remove clip
     *
     * @param \Oktolab\DelorianBundle\Entity\Clip $clip
     */
    public function removeClip(\Oktolab\DelorianBundle\Entity\Clip $clip)
    {
        $this->clip->removeElement($clip);
    }

    /**
     * Get clip
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClip()
    {
        return $this->clip;
    }

    /**
     * Add series
     *
     * @param \Oktolab\DelorianBundle\Entity\Series $series
     * @return ProcessKeyword
     */
    public function addSeries(\Oktolab\DelorianBundle\Entity\Series $series)
    {
        $this->series[] = $series;

        return $this;
    }

    /**
     * Remove series
     *
     * @param \Oktolab\DelorianBundle\Entity\Series $series
     */
    public function removeSeries(\Oktolab\DelorianBundle\Entity\Series $series)
    {
        $this->series->removeElement($series);
    }

    /**
     * Get series
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeries()
    {
        return $this->series;
    }
}
