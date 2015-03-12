<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LockItem
 *
 * @ORM\Table(name="lock_item", indexes={@ORM\Index(name="lock_item_I_1", columns={"reference"}), @ORM\Index(name="lock_item_FI_1", columns={"lock_type_id"}), @ORM\Index(name="lock_item_FI_2", columns={"user_id"})})
 * @ORM\Entity
 */
class LockItem
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
     * @ORM\Column(name="timeout", type="datetime", nullable=false)
     */
    private $timeout;

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
     * @var \LockType
     *
     * @ORM\ManyToOne(targetEntity="LockType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lock_type_id", referencedColumnName="id")
     * })
     */
    private $lockType;

    /**
     * @var \SfGuardUser
     *
     * @ORM\ManyToOne(targetEntity="SfGuardUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * @return LockItem
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
     * Set timeout
     *
     * @param \DateTime $timeout
     * @return LockItem
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Get timeout
     *
     * @return \DateTime 
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return LockItem
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
     * @return LockItem
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
     * Set lockType
     *
     * @param \Oktolab\DelorianBundle\Entity\LockType $lockType
     * @return LockItem
     */
    public function setLockType(\Oktolab\DelorianBundle\Entity\LockType $lockType = null)
    {
        $this->lockType = $lockType;

        return $this;
    }

    /**
     * Get lockType
     *
     * @return \Oktolab\DelorianBundle\Entity\LockType 
     */
    public function getLockType()
    {
        return $this->lockType;
    }

    /**
     * Set user
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $user
     * @return LockItem
     */
    public function setUser(\Oktolab\DelorianBundle\Entity\SfGuardUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Oktolab\DelorianBundle\Entity\SfGuardUser 
     */
    public function getUser()
    {
        return $this->user;
    }
}
