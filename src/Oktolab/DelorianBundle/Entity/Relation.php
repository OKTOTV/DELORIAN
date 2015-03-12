<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relation
 *
 * @ORM\Table(name="relation", indexes={@ORM\Index(name="relation_I_1", columns={"reference1"}), @ORM\Index(name="relation_I_2", columns={"reference2"}), @ORM\Index(name="relation_FI_1", columns={"relation_type_id"})})
 * @ORM\Entity
 */
class Relation
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
     * @ORM\Column(name="reference1", type="integer", nullable=false)
     */
    private $reference1;

    /**
     * @var integer
     *
     * @ORM\Column(name="reference2", type="integer", nullable=false)
     */
    private $reference2;

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
     * @var \RelationType
     *
     * @ORM\ManyToOne(targetEntity="RelationType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relation_type_id", referencedColumnName="id")
     * })
     */
    private $relationType;



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
     * Set reference1
     *
     * @param integer $reference1
     * @return Relation
     */
    public function setReference1($reference1)
    {
        $this->reference1 = $reference1;

        return $this;
    }

    /**
     * Get reference1
     *
     * @return integer 
     */
    public function getReference1()
    {
        return $this->reference1;
    }

    /**
     * Set reference2
     *
     * @param integer $reference2
     * @return Relation
     */
    public function setReference2($reference2)
    {
        $this->reference2 = $reference2;

        return $this;
    }

    /**
     * Get reference2
     *
     * @return integer 
     */
    public function getReference2()
    {
        return $this->reference2;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Relation
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
     * @return Relation
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
     * @return Relation
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
     * Set relationType
     *
     * @param \Oktolab\DelorianBundle\Entity\RelationType $relationType
     * @return Relation
     */
    public function setRelationType(\Oktolab\DelorianBundle\Entity\RelationType $relationType = null)
    {
        $this->relationType = $relationType;

        return $this;
    }

    /**
     * Get relationType
     *
     * @return \Oktolab\DelorianBundle\Entity\RelationType 
     */
    public function getRelationType()
    {
        return $this->relationType;
    }
}
