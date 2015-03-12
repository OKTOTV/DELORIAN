<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EpisodeNameSchema
 *
 * @ORM\Table(name="episode_name_schema", uniqueConstraints={@ORM\UniqueConstraint(name="episode_name_schema_U_1", columns={"name"})})
 * @ORM\Entity
 */
class EpisodeNameSchema
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="show_field_list", type="string", length=255, nullable=true)
     */
    private $showFieldList;

    /**
     * @var string
     *
     * @ORM\Column(name="show_field_format", type="string", length=255, nullable=true)
     */
    private $showFieldFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="file_field_list", type="string", length=255, nullable=true)
     */
    private $fileFieldList;

    /**
     * @var string
     *
     * @ORM\Column(name="file_field_format", type="string", length=255, nullable=true)
     */
    private $fileFieldFormat;

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
     * @return EpisodeNameSchema
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
     * Set title
     *
     * @param string $title
     * @return EpisodeNameSchema
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set showFieldList
     *
     * @param string $showFieldList
     * @return EpisodeNameSchema
     */
    public function setShowFieldList($showFieldList)
    {
        $this->showFieldList = $showFieldList;

        return $this;
    }

    /**
     * Get showFieldList
     *
     * @return string 
     */
    public function getShowFieldList()
    {
        return $this->showFieldList;
    }

    /**
     * Set showFieldFormat
     *
     * @param string $showFieldFormat
     * @return EpisodeNameSchema
     */
    public function setShowFieldFormat($showFieldFormat)
    {
        $this->showFieldFormat = $showFieldFormat;

        return $this;
    }

    /**
     * Get showFieldFormat
     *
     * @return string 
     */
    public function getShowFieldFormat()
    {
        return $this->showFieldFormat;
    }

    /**
     * Set fileFieldList
     *
     * @param string $fileFieldList
     * @return EpisodeNameSchema
     */
    public function setFileFieldList($fileFieldList)
    {
        $this->fileFieldList = $fileFieldList;

        return $this;
    }

    /**
     * Get fileFieldList
     *
     * @return string 
     */
    public function getFileFieldList()
    {
        return $this->fileFieldList;
    }

    /**
     * Set fileFieldFormat
     *
     * @param string $fileFieldFormat
     * @return EpisodeNameSchema
     */
    public function setFileFieldFormat($fileFieldFormat)
    {
        $this->fileFieldFormat = $fileFieldFormat;

        return $this;
    }

    /**
     * Get fileFieldFormat
     *
     * @return string 
     */
    public function getFileFieldFormat()
    {
        return $this->fileFieldFormat;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return EpisodeNameSchema
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
     * @return EpisodeNameSchema
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
}
