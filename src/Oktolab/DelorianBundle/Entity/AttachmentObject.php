<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttachmentObject
 *
 * @ORM\Table(name="attachment_object", uniqueConstraints={@ORM\UniqueConstraint(name="type_reference", columns={"attachment_object_type_id", "reference"})}, indexes={@ORM\Index(name="attachment_object_I_1", columns={"reference"}), @ORM\Index(name="IDX_EAA9ADDED8982436", columns={"attachment_object_type_id"})})
 * @ORM\Entity
 */
class AttachmentObject
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
     * @ORM\Column(name="reference", type="integer", nullable=false)
     */
    private $reference;

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
     * @var \AttachmentObjectType
     *
     * @ORM\ManyToOne(targetEntity="AttachmentObjectType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attachment_object_type_id", referencedColumnName="id")
     * })
     */
    private $attachmentObjectType;



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
     * Set reference
     *
     * @param integer $reference
     * @return AttachmentObject
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return integer 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return AttachmentObject
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
     * @return AttachmentObject
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
     * Set attachmentObjectType
     *
     * @param \Oktolab\DelorianBundle\Entity\AttachmentObjectType $attachmentObjectType
     * @return AttachmentObject
     */
    public function setAttachmentObjectType(\Oktolab\DelorianBundle\Entity\AttachmentObjectType $attachmentObjectType = null)
    {
        $this->attachmentObjectType = $attachmentObjectType;

        return $this;
    }

    /**
     * Get attachmentObjectType
     *
     * @return \Oktolab\DelorianBundle\Entity\AttachmentObjectType 
     */
    public function getAttachmentObjectType()
    {
        return $this->attachmentObjectType;
    }
}
