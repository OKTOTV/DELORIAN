<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SfGuardPermission
 *
 * @ORM\Table(name="sf_guard_permission", uniqueConstraints={@ORM\UniqueConstraint(name="sf_guard_permission_U_1", columns={"name"})})
 * @ORM\Entity
 */
class SfGuardPermission
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
     * @ORM\ManyToMany(targetEntity="SfGuardGroup", mappedBy="permission")
     */
    private $group;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SfGuardUser", mappedBy="permission")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return SfGuardPermission
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
     * @return SfGuardPermission
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
     * Add group
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardGroup $group
     * @return SfGuardPermission
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
     * Add user
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $user
     * @return SfGuardPermission
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
