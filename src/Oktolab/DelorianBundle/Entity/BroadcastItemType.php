<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BroadcastItemType
 *
 * @ORM\Table(name="broadcast_item_type", uniqueConstraints={@ORM\UniqueConstraint(name="broadcast_item_type_U_1", columns={"name"})})
 * @ORM\Entity
 */
class BroadcastItemType
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
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="item_class_name", type="string", length=100, nullable=false)
     */
    private $itemClassName;

    /**
     * @var string
     *
     * @ORM\Column(name="item_reference_column", type="string", length=100, nullable=false)
     */
    private $itemReferenceColumn;



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
     * @return BroadcastItemType
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
     * Set description
     *
     * @param string $description
     * @return BroadcastItemType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set itemClassName
     *
     * @param string $itemClassName
     * @return BroadcastItemType
     */
    public function setItemClassName($itemClassName)
    {
        $this->itemClassName = $itemClassName;

        return $this;
    }

    /**
     * Get itemClassName
     *
     * @return string 
     */
    public function getItemClassName()
    {
        return $this->itemClassName;
    }

    /**
     * Set itemReferenceColumn
     *
     * @param string $itemReferenceColumn
     * @return BroadcastItemType
     */
    public function setItemReferenceColumn($itemReferenceColumn)
    {
        $this->itemReferenceColumn = $itemReferenceColumn;

        return $this;
    }

    /**
     * Get itemReferenceColumn
     *
     * @return string 
     */
    public function getItemReferenceColumn()
    {
        return $this->itemReferenceColumn;
    }
}
