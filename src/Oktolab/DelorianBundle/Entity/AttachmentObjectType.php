<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttachmentObjectType
 *
 * @ORM\Table(name="attachment_object_type", uniqueConstraints={@ORM\UniqueConstraint(name="attachment_object_type_U_1", columns={"class_name"})})
 * @ORM\Entity
 */
class AttachmentObjectType
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
     * @ORM\Column(name="class_name", type="string", length=255, nullable=false)
     */
    private $className;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;



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
     * Set className
     *
     * @param string $className
     * @return AttachmentObjectType
     */
    public function setClassName($className)
    {
        $this->className = $className;

        return $this;
    }

    /**
     * Get className
     *
     * @return string 
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return AttachmentObjectType
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
}
