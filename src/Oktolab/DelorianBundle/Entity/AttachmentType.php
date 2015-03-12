<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttachmentType
 *
 * @ORM\Table(name="attachment_type", uniqueConstraints={@ORM\UniqueConstraint(name="attachment_type_U_1", columns={"name"})})
 * @ORM\Entity
 */
class AttachmentType
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
     * @ORM\Column(name="extensions", type="string", length=255, nullable=false)
     */
    private $extensions;



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
     * @return AttachmentType
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
     * @return AttachmentType
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
     * Set extensions
     *
     * @param string $extensions
     * @return AttachmentType
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * Get extensions
     *
     * @return string 
     */
    public function getExtensions()
    {
        return $this->extensions;
    }
}
