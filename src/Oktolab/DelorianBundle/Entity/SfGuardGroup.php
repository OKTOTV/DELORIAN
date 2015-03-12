<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SfGuardGroup
 *
 * @ORM\Table(name="sf_guard_group", uniqueConstraints={@ORM\UniqueConstraint(name="sf_guard_group_U_1", columns={"name"})})
 * @ORM\Entity
 */
class SfGuardGroup
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SfGuardPermission", inversedBy="group")
     * @ORM\JoinTable(name="sf_guard_group_permission",
     *   joinColumns={
     *     @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="permission_id", referencedColumnName="id")
     *   }
     * )
     */
    private $permission;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SfGuardUser", mappedBy="group")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permission = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return SfGuardGroup
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
     * @return SfGuardGroup
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
     * Add permission
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardPermission $permission
     * @return SfGuardGroup
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

    /**
     * Add user
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $user
     * @return SfGuardGroup
     */
    public function addUser(\Oktolab\DelorianBundle\Entity\SfGuardUser $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $user
     */
    public function removeUser(\Oktolab\DelorianBundle\Entity\SfGuardUser $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}
