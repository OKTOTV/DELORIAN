<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoFile
 *
 * @ORM\Table(name="video_file", indexes={@ORM\Index(name="video_file_I_1", columns={"default_file_name"}), @ORM\Index(name="video_file_I_2", columns={"checksum"}), @ORM\Index(name="video_file_FI_1", columns={"video_id"}), @ORM\Index(name="video_file_FI_2", columns={"file_format_id"})})
 * @ORM\Entity
 */
class VideoFile
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
     * @ORM\Column(name="default_file_name", type="string", length=255, nullable=false)
     */
    private $defaultFileName;

    /**
     * @var integer
     *
     * @ORM\Column(name="file_size", type="bigint", nullable=true)
     */
    private $fileSize;

    /**
     * @var string
     *
     * @ORM\Column(name="checksum", type="string", length=255, nullable=true)
     */
    private $checksum;

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="decimal", precision=11, scale=5, nullable=true)
     */
    private $length = '0.00000';

    /**
     * @var string
     *
     * @ORM\Column(name="aspect_ratio", type="decimal", precision=3, scale=2, nullable=true)
     */
    private $aspectRatio = '1.33';

    /**
     * @var string
     *
     * @ORM\Column(name="framerate", type="decimal", precision=6, scale=4, nullable=true)
     */
    private $framerate = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="media_info_dump", type="text", nullable=true)
     */
    private $mediaInfoDump;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afd_code", type="boolean", nullable=true)
     */
    private $afdCode;

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
     * @var \FileFormat
     *
     * @ORM\ManyToOne(targetEntity="FileFormat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="file_format_id", referencedColumnName="id")
     * })
     */
    private $fileFormat;

    /**
     * @var \Video
     *
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     * })
     */
    private $video;



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
     * Set defaultFileName
     *
     * @param string $defaultFileName
     * @return VideoFile
     */
    public function setDefaultFileName($defaultFileName)
    {
        $this->defaultFileName = $defaultFileName;

        return $this;
    }

    /**
     * Get defaultFileName
     *
     * @return string 
     */
    public function getDefaultFileName()
    {
        return $this->defaultFileName;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     * @return VideoFile
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return integer 
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set checksum
     *
     * @param string $checksum
     * @return VideoFile
     */
    public function setChecksum($checksum)
    {
        $this->checksum = $checksum;

        return $this;
    }

    /**
     * Get checksum
     *
     * @return string 
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * Set length
     *
     * @param string $length
     * @return VideoFile
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set aspectRatio
     *
     * @param string $aspectRatio
     * @return VideoFile
     */
    public function setAspectRatio($aspectRatio)
    {
        $this->aspectRatio = $aspectRatio;

        return $this;
    }

    /**
     * Get aspectRatio
     *
     * @return string 
     */
    public function getAspectRatio()
    {
        return $this->aspectRatio;
    }

    /**
     * Set framerate
     *
     * @param string $framerate
     * @return VideoFile
     */
    public function setFramerate($framerate)
    {
        $this->framerate = $framerate;

        return $this;
    }

    /**
     * Get framerate
     *
     * @return string 
     */
    public function getFramerate()
    {
        return $this->framerate;
    }

    /**
     * Set mediaInfoDump
     *
     * @param string $mediaInfoDump
     * @return VideoFile
     */
    public function setMediaInfoDump($mediaInfoDump)
    {
        $this->mediaInfoDump = $mediaInfoDump;

        return $this;
    }

    /**
     * Get mediaInfoDump
     *
     * @return string 
     */
    public function getMediaInfoDump()
    {
        return $this->mediaInfoDump;
    }

    /**
     * Set afdCode
     *
     * @param boolean $afdCode
     * @return VideoFile
     */
    public function setAfdCode($afdCode)
    {
        $this->afdCode = $afdCode;

        return $this;
    }

    /**
     * Get afdCode
     *
     * @return boolean 
     */
    public function getAfdCode()
    {
        return $this->afdCode;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return VideoFile
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
     * @return VideoFile
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
     * Set fileFormat
     *
     * @param \Oktolab\DelorianBundle\Entity\FileFormat $fileFormat
     * @return VideoFile
     */
    public function setFileFormat(\Oktolab\DelorianBundle\Entity\FileFormat $fileFormat = null)
    {
        $this->fileFormat = $fileFormat;

        return $this;
    }

    /**
     * Get fileFormat
     *
     * @return \Oktolab\DelorianBundle\Entity\FileFormat 
     */
    public function getFileFormat()
    {
        return $this->fileFormat;
    }

    /**
     * Set video
     *
     * @param \Oktolab\DelorianBundle\Entity\Video $video
     * @return VideoFile
     */
    public function setVideo(\Oktolab\DelorianBundle\Entity\Video $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \Oktolab\DelorianBundle\Entity\Video 
     */
    public function getVideo()
    {
        return $this->video;
    }
}
