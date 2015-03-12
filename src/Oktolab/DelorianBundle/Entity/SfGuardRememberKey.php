<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SfGuardRememberKey
 *
 * @ORM\Table(name="sf_guard_remember_key", indexes={@ORM\Index(name="IDX_1EEA28AA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class SfGuardRememberKey
{
    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ipAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="remember_key", type="string", length=32, nullable=true)
     */
    private $rememberKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \SfGuardUser
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="SfGuardUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return SfGuardRememberKey
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set rememberKey
     *
     * @param string $rememberKey
     * @return SfGuardRememberKey
     */
    public function setRememberKey($rememberKey)
    {
        $this->rememberKey = $rememberKey;

        return $this;
    }

    /**
     * Get rememberKey
     *
     * @return string 
     */
    public function getRememberKey()
    {
        return $this->rememberKey;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return SfGuardRememberKey
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
     * Set user
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $user
     * @return SfGuardRememberKey
     */
    public function setUser(\Oktolab\DelorianBundle\Entity\SfGuardUser $user)
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
