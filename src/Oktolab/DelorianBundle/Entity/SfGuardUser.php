<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SfGuardUser
 *
 * @ORM\Table(name="sf_guard_user", uniqueConstraints={@ORM\UniqueConstraint(name="sf_guard_user_U_1", columns={"username"})})
 * @ORM\Entity
 */
class SfGuardUser
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
     * @ORM\Column(name="username", type="string", length=128, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="algorithm", type="string", length=128, nullable=false)
     */
    private $algorithm = 'sha1';

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=128, nullable=false)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive = '1';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_super_admin", type="boolean", nullable=false)
     */
    private $isSuperAdmin = '0';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SfGuardGroup", inversedBy="user")
     * @ORM\JoinTable(name="sf_guard_user_group",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *   }
     * )
     */
    private $group;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SfGuardPermission", inversedBy="user")
     * @ORM\JoinTable(name="sf_guard_user_permission",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="permission_id", referencedColumnName="id")
     *   }
     * )
     */
    private $permission;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
        $this->permission = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set username
     *
     * @param string $username
     * @return SfGuardUser
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set algorithm
     *
     * @param string $algorithm
     * @return SfGuardUser
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;

        return $this;
    }

    /**
     * Get algorithm
     *
     * @return string 
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return SfGuardUser
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return SfGuardUser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return SfGuardUser
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
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return SfGuardUser
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return SfGuardUser
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set isSuperAdmin
     *
     * @param boolean $isSuperAdmin
     * @return SfGuardUser
     */
    public function setIsSuperAdmin($isSuperAdmin)
    {
        $this->isSuperAdmin = $isSuperAdmin;

        return $this;
    }

    /**
     * Get isSuperAdmin
     *
     * @return boolean 
     */
    public function getIsSuperAdmin()
    {
        return $this->isSuperAdmin;
    }

    /**
     * Add group
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardGroup $group
     * @return SfGuardUser
     */
    public function addGroup(\Oktolab\DelorianBundle\Entity\SfGuardGroup $group)
    {
        $this->group[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardGroup $group
     */
    public function removeGroup(\Oktolab\DelorianBundle\Entity\SfGuardGroup $group)
    {
        $this->group->removeElement($group);
    }

    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Add permission
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardPermission $permission
     * @return SfGuardUser
     */
    public function addPermission(\Oktolab\DelorianBundle\Entity\SfGuardPermission $permission)
    {
        $this->permission[] = $permission;

        return $this;
    }

    /**
     * Remove permission
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardPermission $permission
     */
    public function removePermission(\Oktolab\DelorianBundle\Entity\SfGuardPermission $permission)
    {
        $this->permission->removeElement($permission);
    }

    /**
     * Get permission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPermission()
    {
        return $this->permission;
    }
}
