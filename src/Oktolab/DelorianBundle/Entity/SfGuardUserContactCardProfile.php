<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SfGuardUserContactCardProfile
 *
 * @ORM\Table(name="sf_guard_user_contact_card_profile", uniqueConstraints={@ORM\UniqueConstraint(name="sf_guard_user_contact_card_profile_U_1", columns={"user_id"})}, indexes={@ORM\Index(name="sf_guard_user_contact_card_profile_FI_2", columns={"database_contact_card_id"})})
 * @ORM\Entity
 */
class SfGuardUserContactCardProfile
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
     * @ORM\Column(name="display_name", type="string", length=255, nullable=true)
     */
    private $displayName;

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
     * @var \SfGuardUser
     *
     * @ORM\ManyToOne(targetEntity="SfGuardUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \DatabaseContactCard
     *
     * @ORM\ManyToOne(targetEntity="DatabaseContactCard")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="database_contact_card_id", referencedColumnName="id")
     * })
     */
    private $databaseContactCard;



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
     * Set displayName
     *
     * @param string $displayName
     * @return SfGuardUserContactCardProfile
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return SfGuardUserContactCardProfile
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
     * @return SfGuardUserContactCardProfile
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
     * Set user
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $user
     * @return SfGuardUserContactCardProfile
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

    /**
     * Set databaseContactCard
     *
     * @param \Oktolab\DelorianBundle\Entity\DatabaseContactCard $databaseContactCard
     * @return SfGuardUserContactCardProfile
     */
    public function setDatabaseContactCard(\Oktolab\DelorianBundle\Entity\DatabaseContactCard $databaseContactCard = null)
    {
        $this->databaseContactCard = $databaseContactCard;

        return $this;
    }

    /**
     * Get databaseContactCard
     *
     * @return \Oktolab\DelorianBundle\Entity\DatabaseContactCard 
     */
    public function getDatabaseContactCard()
    {
        return $this->databaseContactCard;
    }
}
