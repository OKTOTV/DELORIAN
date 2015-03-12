<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactCardRole
 *
 * @ORM\Table(name="contact_card_role", uniqueConstraints={@ORM\UniqueConstraint(name="contact_card_role_U_1", columns={"name"})}, indexes={@ORM\Index(name="contact_card_role_I_1", columns={"class_name"})})
 * @ORM\Entity
 */
class ContactCardRole
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
     * @ORM\Column(name="class_name", type="string", length=255, nullable=false)
     */
    private $className;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_reuse", type="boolean", nullable=true)
     */
    private $allowReuse = '1';

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
     * @return ContactCardRole
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
     * Set className
     *
     * @param string $className
     * @return ContactCardRole
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
     * @return ContactCardRole
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
     * Set allowReuse
     *
     * @param boolean $allowReuse
     * @return ContactCardRole
     */
    public function setAllowReuse($allowReuse)
    {
        $this->allowReuse = $allowReuse;

        return $this;
    }

    /**
     * Get allowReuse
     *
     * @return boolean 
     */
    public function getAllowReuse()
    {
        return $this->allowReuse;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ContactCardRole
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
     * @return ContactCardRole
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
