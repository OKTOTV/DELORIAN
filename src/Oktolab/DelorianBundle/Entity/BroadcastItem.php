<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BroadcastItem
 *
 * @ORM\Table(name="broadcast_item", indexes={@ORM\Index(name="broadcast_item_FI_1", columns={"broadcast_item_type_id"}), @ORM\Index(name="broadcast_item_FI_2", columns={"broadcast_item_status_id"}), @ORM\Index(name="broadcast_item_FI_3", columns={"finalized_by"}), @ORM\Index(name="broadcast_item_FI_4", columns={"approved_by"})})
 * @ORM\Entity
 */
class BroadcastItem
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
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="airtime", type="datetime", nullable=true)
     */
    private $airtime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_airtime", type="datetime", nullable=true)
     */
    private $endAirtime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sent_airtime", type="datetime", nullable=true)
     */
    private $sentAirtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $length;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_locked", type="boolean", nullable=true)
     */
    private $isLocked = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="attached_to", type="integer", nullable=true)
     */
    private $attachedTo;

    /**
     * @var string
     *
     * @ORM\Column(name="highlight_group", type="string", length=20, nullable=true)
     */
    private $highlightGroup = 'g_bc';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finalized_at", type="datetime", nullable=true)
     */
    private $finalizedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="approved_at", type="datetime", nullable=true)
     */
    private $approvedAt;

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
     * @var \BroadcastItemType
     *
     * @ORM\ManyToOne(targetEntity="BroadcastItemType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="broadcast_item_type_id", referencedColumnName="id")
     * })
     */
    private $broadcastItemType;

    /**
     * @var \BroadcastItemStatus
     *
     * @ORM\ManyToOne(targetEntity="BroadcastItemStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="broadcast_item_status_id", referencedColumnName="id")
     * })
     */
    private $broadcastItemStatus;

    /**
     * @var \SfGuardUser
     *
     * @ORM\ManyToOne(targetEntity="SfGuardUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="finalized_by", referencedColumnName="id")
     * })
     */
    private $finalizedBy;

    /**
     * @var \SfGuardUser
     *
     * @ORM\ManyToOne(targetEntity="SfGuardUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="approved_by", referencedColumnName="id")
     * })
     */
    private $approvedBy;



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
     * @return BroadcastItem
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
     * Set content
     *
     * @param string $content
     * @return BroadcastItem
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set airtime
     *
     * @param \DateTime $airtime
     * @return BroadcastItem
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
     * Set endAirtime
     *
     * @param \DateTime $endAirtime
     * @return BroadcastItem
     */
    public function setEndAirtime($endAirtime)
    {
        $this->endAirtime = $endAirtime;

        return $this;
    }

    /**
     * Get endAirtime
     *
     * @return \DateTime 
     */
    public function getEndAirtime()
    {
        return $this->endAirtime;
    }

    /**
     * Set sentAirtime
     *
     * @param \DateTime $sentAirtime
     * @return BroadcastItem
     */
    public function setSentAirtime($sentAirtime)
    {
        $this->sentAirtime = $sentAirtime;

        return $this;
    }

    /**
     * Get sentAirtime
     *
     * @return \DateTime 
     */
    public function getSentAirtime()
    {
        return $this->sentAirtime;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return BroadcastItem
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
     * Set isLocked
     *
     * @param boolean $isLocked
     * @return BroadcastItem
     */
    public function setIsLocked($isLocked)
    {
        $this->isLocked = $isLocked;

        return $this;
    }

    /**
     * Get isLocked
     *
     * @return boolean 
     */
    public function getIsLocked()
    {
        return $this->isLocked;
    }

    /**
     * Set attachedTo
     *
     * @param integer $attachedTo
     * @return BroadcastItem
     */
    public function setAttachedTo($attachedTo)
    {
        $this->attachedTo = $attachedTo;

        return $this;
    }

    /**
     * Get attachedTo
     *
     * @return integer 
     */
    public function getAttachedTo()
    {
        return $this->attachedTo;
    }

    /**
     * Set highlightGroup
     *
     * @param string $highlightGroup
     * @return BroadcastItem
     */
    public function setHighlightGroup($highlightGroup)
    {
        $this->highlightGroup = $highlightGroup;

        return $this;
    }

    /**
     * Get highlightGroup
     *
     * @return string 
     */
    public function getHighlightGroup()
    {
        return $this->highlightGroup;
    }

    /**
     * Set finalizedAt
     *
     * @param \DateTime $finalizedAt
     * @return BroadcastItem
     */
    public function setFinalizedAt($finalizedAt)
    {
        $this->finalizedAt = $finalizedAt;

        return $this;
    }

    /**
     * Get finalizedAt
     *
     * @return \DateTime 
     */
    public function getFinalizedAt()
    {
        return $this->finalizedAt;
    }

    /**
     * Set approvedAt
     *
     * @param \DateTime $approvedAt
     * @return BroadcastItem
     */
    public function setApprovedAt($approvedAt)
    {
        $this->approvedAt = $approvedAt;

        return $this;
    }

    /**
     * Get approvedAt
     *
     * @return \DateTime 
     */
    public function getApprovedAt()
    {
        return $this->approvedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BroadcastItem
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
     * @return BroadcastItem
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
     * Set broadcastItemType
     *
     * @param \Oktolab\DelorianBundle\Entity\BroadcastItemType $broadcastItemType
     * @return BroadcastItem
     */
    public function setBroadcastItemType(\Oktolab\DelorianBundle\Entity\BroadcastItemType $broadcastItemType = null)
    {
        $this->broadcastItemType = $broadcastItemType;

        return $this;
    }

    /**
     * Get broadcastItemType
     *
     * @return \Oktolab\DelorianBundle\Entity\BroadcastItemType 
     */
    public function getBroadcastItemType()
    {
        return $this->broadcastItemType;
    }

    /**
     * Set broadcastItemStatus
     *
     * @param \Oktolab\DelorianBundle\Entity\BroadcastItemStatus $broadcastItemStatus
     * @return BroadcastItem
     */
    public function setBroadcastItemStatus(\Oktolab\DelorianBundle\Entity\BroadcastItemStatus $broadcastItemStatus = null)
    {
        $this->broadcastItemStatus = $broadcastItemStatus;

        return $this;
    }

    /**
     * Get broadcastItemStatus
     *
     * @return \Oktolab\DelorianBundle\Entity\BroadcastItemStatus 
     */
    public function getBroadcastItemStatus()
    {
        return $this->broadcastItemStatus;
    }

    /**
     * Set finalizedBy
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $finalizedBy
     * @return BroadcastItem
     */
    public function setFinalizedBy(\Oktolab\DelorianBundle\Entity\SfGuardUser $finalizedBy = null)
    {
        $this->finalizedBy = $finalizedBy;

        return $this;
    }

    /**
     * Get finalizedBy
     *
     * @return \Oktolab\DelorianBundle\Entity\SfGuardUser 
     */
    public function getFinalizedBy()
    {
        return $this->finalizedBy;
    }

    /**
     * Set approvedBy
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $approvedBy
     * @return BroadcastItem
     */
    public function setApprovedBy(\Oktolab\DelorianBundle\Entity\SfGuardUser $approvedBy = null)
    {
        $this->approvedBy = $approvedBy;

        return $this;
    }

    /**
     * Get approvedBy
     *
     * @return \Oktolab\DelorianBundle\Entity\SfGuardUser 
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }
}
