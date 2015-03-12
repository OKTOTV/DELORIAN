<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video", uniqueConstraints={@ORM\UniqueConstraint(name="video_U_1", columns={"short_code"})}, indexes={@ORM\Index(name="video_FI_1", columns={"video_owner_id"}), @ORM\Index(name="video_FI_2", columns={"licence_type_id"}), @ORM\Index(name="video_FI_3", columns={"contract_id"})})
 * @ORM\Entity
 */
class Video
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="short_code", type="string", length=255, nullable=false)
     */
    private $shortCode;

    /**
     * @var string
     *
     * @ORM\Column(name="default_length", type="decimal", precision=11, scale=5, nullable=true)
     */
    private $defaultLength = '0.00000';

    /**
     * @var string
     *
     * @ORM\Column(name="default_framerate", type="decimal", precision=6, scale=4, nullable=true)
     */
    private $defaultFramerate = '0.0000';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_editable", type="boolean", nullable=true)
     */
    private $isEditable = '1';

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
     * @var \VideoOwner
     *
     * @ORM\ManyToOne(targetEntity="VideoOwner")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="video_owner_id", referencedColumnName="id")
     * })
     */
    private $videoOwner;

    /**
     * @var \LicenceType
     *
     * @ORM\ManyToOne(targetEntity="LicenceType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="licence_type_id", referencedColumnName="id")
     * })
     */
    private $licenceType;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Video
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
     * Set shortCode
     *
     * @param string $shortCode
     * @return Video
     */
    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;

        return $this;
    }

    /**
     * Get shortCode
     *
     * @return string 
     */
    public function getShortCode()
    {
        return $this->shortCode;
    }

    /**
     * Set defaultLength
     *
     * @param string $defaultLength
     * @return Video
     */
    public function setDefaultLength($defaultLength)
    {
        $this->defaultLength = $defaultLength;

        return $this;
    }

    /**
     * Get defaultLength
     *
     * @return string 
     */
    public function getDefaultLength()
    {
        return $this->defaultLength;
    }

    /**
     * Set defaultFramerate
     *
     * @param string $defaultFramerate
     * @return Video
     */
    public function setDefaultFramerate($defaultFramerate)
    {
        $this->defaultFramerate = $defaultFramerate;

        return $this;
    }

    /**
     * Get defaultFramerate
     *
     * @return string 
     */
    public function getDefaultFramerate()
    {
        return $this->defaultFramerate;
    }

    /**
     * Set isEditable
     *
     * @param boolean $isEditable
     * @return Video
     */
    public function setIsEditable($isEditable)
    {
        $this->isEditable = $isEditable;

        return $this;
    }

    /**
     * Get isEditable
     *
     * @return boolean 
     */
    public function getIsEditable()
    {
        return $this->isEditable;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Video
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
     * @return Video
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
     * Set videoOwner
     *
     * @param \Oktolab\DelorianBundle\Entity\VideoOwner $videoOwner
     * @return Video
     */
    public function setVideoOwner(\Oktolab\DelorianBundle\Entity\VideoOwner $videoOwner = null)
    {
        $this->videoOwner = $videoOwner;

        return $this;
    }

    /**
     * Get videoOwner
     *
     * @return \Oktolab\DelorianBundle\Entity\VideoOwner 
     */
    public function getVideoOwner()
    {
        return $this->videoOwner;
    }

    /**
     * Set licenceType
     *
     * @param \Oktolab\DelorianBundle\Entity\LicenceType $licenceType
     * @return Video
     */
    public function setLicenceType(\Oktolab\DelorianBundle\Entity\LicenceType $licenceType = null)
    {
        $this->licenceType = $licenceType;

        return $this;
    }

    /**
     * Get licenceType
     *
     * @return \Oktolab\DelorianBundle\Entity\LicenceType 
     */
    public function getLicenceType()
    {
        return $this->licenceType;
    }

    /**
     * Set contract
     *
     * @param \Oktolab\DelorianBundle\Entity\Contract $contract
     * @return Video
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
}
