<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attachment
 *
 * @ORM\Table(name="attachment", indexes={@ORM\Index(name="attachment_FI_1", columns={"attachment_type_id"}), @ORM\Index(name="attachment_FI_2", columns={"attachment_object_id"}), @ORM\Index(name="attachment_FI_3", columns={"attachment_role_id"})})
 * @ORM\Entity
 */
class Attachment
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="mimetype", type="string", length=255, nullable=false)
     */
    private $mimetype;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255, nullable=false)
     */
    private $fileName;

    /**
     * @var integer
     *
     * @ORM\Column(name="file_size", type="integer", nullable=false)
     */
    private $fileSize;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="blob", nullable=false)
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleteme", type="boolean", nullable=true)
     */
    private $deleteme = '0';

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
     * @var \AttachmentType
     *
     * @ORM\ManyToOne(targetEntity="AttachmentType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attachment_type_id", referencedColumnName="id")
     * })
     */
    private $attachmentType;

    /**
     * @var \AttachmentObject
     *
     * @ORM\ManyToOne(targetEntity="AttachmentObject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attachment_object_id", referencedColumnName="id")
     * })
     */
    private $attachmentObject;

    /**
     * @var \AttachmentRole
     *
     * @ORM\ManyToOne(targetEntity="AttachmentRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attachment_role_id", referencedColumnName="id")
     * })
     */
    private $attachmentRole;



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
     * @return Attachment
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
     * Set mimetype
     *
     * @param string $mimetype
     * @return Attachment
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;

        return $this;
    }

    /**
     * Get mimetype
     *
     * @return string 
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Attachment
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
     * Set fileName
     *
     * @param string $fileName
     * @return Attachment
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string 
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     * @return Attachment
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
     * Set content
     *
     * @param string $content
     * @return Attachment
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
     * Set deleteme
     *
     * @param boolean $deleteme
     * @return Attachment
     */
    public function setDeleteme($deleteme)
    {
        $this->deleteme = $deleteme;

        return $this;
    }

    /**
     * Get deleteme
     *
     * @return boolean 
     */
    public function getDeleteme()
    {
        return $this->deleteme;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Attachment
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
     * @return Attachment
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
     * Set attachmentType
     *
     * @param \Oktolab\DelorianBundle\Entity\AttachmentType $attachmentType
     * @return Attachment
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
     * Set attachmentObject
     *
     * @param \Oktolab\DelorianBundle\Entity\AttachmentObject $attachmentObject
     * @return Attachment
     */
    public function setAttachmentObject(\Oktolab\DelorianBundle\Entity\AttachmentObject $attachmentObject = null)
    {
        $this->attachmentObject = $attachmentObject;

        return $this;
    }

    /**
     * Get attachmentObject
     *
     * @return \Oktolab\DelorianBundle\Entity\AttachmentObject 
     */
    public function getAttachmentObject()
    {
        return $this->attachmentObject;
    }

    /**
     * Set attachmentRole
     *
     * @param \Oktolab\DelorianBundle\Entity\AttachmentRole $attachmentRole
     * @return Attachment
     */
    public function setAttachmentRole(\Oktolab\DelorianBundle\Entity\AttachmentRole $attachmentRole = null)
    {
        $this->attachmentRole = $attachmentRole;

        return $this;
    }

    /**
     * Get attachmentRole
     *
     * @return \Oktolab\DelorianBundle\Entity\AttachmentRole 
     */
    public function getAttachmentRole()
    {
        return $this->attachmentRole;
    }
}
