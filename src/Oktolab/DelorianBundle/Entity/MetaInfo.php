<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetaInfo
 *
 * @ORM\Table(name="meta_info", indexes={@ORM\Index(name="meta_info_I_1", columns={"reference"}), @ORM\Index(name="meta_info_I_2", columns={"meta_key"}), @ORM\Index(name="type_reference", columns={"meta_info_object_type_id", "reference"}), @ORM\Index(name="IDX_582F4214D9CB2AFE", columns={"meta_info_object_type_id"})})
 * @ORM\Entity
 */
class MetaInfo
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
     * @var string
     *
     * @ORM\Column(name="meta_key", type="string", length=255, nullable=false)
     */
    private $metaKey;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_value", type="string", length=255, nullable=true)
     */
    private $metaValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position = '0';

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
     * @var \MetaInfoObjectType
     *
     * @ORM\ManyToOne(targetEntity="MetaInfoObjectType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="meta_info_object_type_id", referencedColumnName="id")
     * })
     */
    private $metaInfoObjectType;



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
     * @return MetaInfo
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
     * Set metaKey
     *
     * @param string $metaKey
     * @return MetaInfo
     */
    public function setMetaKey($metaKey)
    {
        $this->metaKey = $metaKey;

        return $this;
    }

    /**
     * Get metaKey
     *
     * @return string 
     */
    public function getMetaKey()
    {
        return $this->metaKey;
    }

    /**
     * Set metaValue
     *
     * @param string $metaValue
     * @return MetaInfo
     */
    public function setMetaValue($metaValue)
    {
        $this->metaValue = $metaValue;

        return $this;
    }

    /**
     * Get metaValue
     *
     * @return string 
     */
    public function getMetaValue()
    {
        return $this->metaValue;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return MetaInfo
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return MetaInfo
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
     * @return MetaInfo
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
     * Set metaInfoObjectType
     *
     * @param \Oktolab\DelorianBundle\Entity\MetaInfoObjectType $metaInfoObjectType
     * @return MetaInfo
     */
    public function setMetaInfoObjectType(\Oktolab\DelorianBundle\Entity\MetaInfoObjectType $metaInfoObjectType = null)
    {
        $this->metaInfoObjectType = $metaInfoObjectType;

        return $this;
    }

    /**
     * Get metaInfoObjectType
     *
     * @return \Oktolab\DelorianBundle\Entity\MetaInfoObjectType 
     */
    public function getMetaInfoObjectType()
    {
        return $this->metaInfoObjectType;
    }
}
