<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelationType
 *
 * @ORM\Table(name="relation_type", uniqueConstraints={@ORM\UniqueConstraint(name="relation_type_U_1", columns={"name"})})
 * @ORM\Entity
 */
class RelationType
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
     * @ORM\Column(name="reference1_class_name", type="string", length=255, nullable=false)
     */
    private $reference1ClassName;

    /**
     * @var string
     *
     * @ORM\Column(name="reference2_class_name", type="string", length=255, nullable=false)
     */
    private $reference2ClassName;

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
     * @return RelationType
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
     * @return RelationType
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
     * Set reference1ClassName
     *
     * @param string $reference1ClassName
     * @return RelationType
     */
    public function setReference1ClassName($reference1ClassName)
    {
        $this->reference1ClassName = $reference1ClassName;

        return $this;
    }

    /**
     * Get reference1ClassName
     *
     * @return string 
     */
    public function getReference1ClassName()
    {
        return $this->reference1ClassName;
    }

    /**
     * Set reference2ClassName
     *
     * @param string $reference2ClassName
     * @return RelationType
     */
    public function setReference2ClassName($reference2ClassName)
    {
        $this->reference2ClassName = $reference2ClassName;

        return $this;
    }

    /**
     * Get reference2ClassName
     *
     * @return string 
     */
    public function getReference2ClassName()
    {
        return $this->reference2ClassName;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return RelationType
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
     * @return RelationType
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
