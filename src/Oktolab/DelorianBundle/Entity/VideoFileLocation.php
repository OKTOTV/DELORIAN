<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoFileLocation
 *
 * @ORM\Table(name="video_file_location", indexes={@ORM\Index(name="video_file_location_FI_1", columns={"video_file_id"}), @ORM\Index(name="video_file_location_FI_2", columns={"sub_location_id"})})
 * @ORM\Entity
 */
class VideoFileLocation
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
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;

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
     * @var \SubLocation
     *
     * @ORM\ManyToOne(targetEntity="SubLocation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sub_location_id", referencedColumnName="id")
     * })
     */
    private $subLocation;

    /**
     * @var \VideoFile
     *
     * @ORM\ManyToOne(targetEntity="VideoFile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="video_file_id", referencedColumnName="id")
     * })
     */
    private $videoFile;



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
     * Set path
     *
     * @param string $path
     * @return VideoFileLocation
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return VideoFileLocation
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
     * @return VideoFileLocation
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
     * Set subLocation
     *
     * @param \Oktolab\DelorianBundle\Entity\SubLocation $subLocation
     * @return VideoFileLocation
     */
    public function setSubLocation(\Oktolab\DelorianBundle\Entity\SubLocation $subLocation = null)
    {
        $this->subLocation = $subLocation;

        return $this;
    }

    /**
     * Get subLocation
     *
     * @return \Oktolab\DelorianBundle\Entity\SubLocation 
     */
    public function getSubLocation()
    {
        return $this->subLocation;
    }

    /**
     * Set videoFile
     *
     * @param \Oktolab\DelorianBundle\Entity\VideoFile $videoFile
     * @return VideoFileLocation
     */
    public function setVideoFile(\Oktolab\DelorianBundle\Entity\VideoFile $videoFile = null)
    {
        $this->videoFile = $videoFile;

        return $this;
    }

    /**
     * Get videoFile
     *
     * @return \Oktolab\DelorianBundle\Entity\VideoFile 
     */
    public function getVideoFile()
    {
        return $this->videoFile;
    }
}
