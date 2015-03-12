<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttachmentRole
 *
 * @ORM\Table(name="attachment_role", uniqueConstraints={@ORM\UniqueConstraint(name="attachment_role_U_1", columns={"name"})}, indexes={@ORM\Index(name="attachment_role_FI_1", columns={"attachment_type_id"}), @ORM\Index(name="attachment_role_FI_2", columns={"attachment_object_type_id"})})
 * @ORM\Entity
 */
class AttachmentRole
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
     * @var \AttachmentType
     *
     * @ORM\ManyToOne(targetEntity="AttachmentType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attachment_type_id", referencedColumnName="id")
     * })
     */
    private $attachmentType;

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
     * Set name
     *
     * @param string $name
     * @return AttachmentRole
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
     * @return AttachmentRole
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
     * Set attachmentType
     *
     * @param \Oktolab\DelorianBundle\Entity\AttachmentType $attachmentType
     * @return AttachmentRole
     */
    public function setAttachmentType(\Oktolab\DelorianBundle\Entity\AttachmentType $attachmentType = null)
    {
        $this->attachmentType = $attachmentType;

        return $this;
    }

    /**
     * Get attachmentType
     *
     * @return \Oktolab\DelorianBundle\Entity\AttachmentType 
     */
    public function getAttachmentType()
    {
        return $this->attachmentType;
    }

    /**
     * Set attachmentObjectType
     *
     * @param \Oktolab\DelorianBundle\Entity\AttachmentObjectType $attachmentObjectType
     * @return AttachmentRole
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
