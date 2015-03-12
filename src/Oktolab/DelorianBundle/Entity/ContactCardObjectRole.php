<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactCardObjectRole
 *
 * @ORM\Table(name="contact_card_object_role", indexes={@ORM\Index(name="contact_card_object_role_I_1", columns={"reference"}), @ORM\Index(name="contact_card_object_role_FI_1", columns={"database_contact_card_id"}), @ORM\Index(name="contact_card_object_role_FI_2", columns={"contact_card_role_id"})})
 * @ORM\Entity
 */
class ContactCardObjectRole
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
     * @var \DatabaseContactCard
     *
     * @ORM\ManyToOne(targetEntity="DatabaseContactCard")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="database_contact_card_id", referencedColumnName="id")
     * })
     */
    private $databaseContactCard;

    /**
     * @var \ContactCardRole
     *
     * @ORM\ManyToOne(targetEntity="ContactCardRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_card_role_id", referencedColumnName="id")
     * })
     */
    private $contactCardRole;



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
     * @return ContactCardObjectRole
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ContactCardObjectRole
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
     * @return ContactCardObjectRole
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
     * Set databaseContactCard
     *
     * @param \Oktolab\DelorianBundle\Entity\DatabaseContactCard $databaseContactCard
     * @return ContactCardObjectRole
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

    /**
     * Set contactCardRole
     *
     * @param \Oktolab\DelorianBundle\Entity\ContactCardRole $contactCardRole
     * @return ContactCardObjectRole
     */
    public function setContactCardRole(\Oktolab\DelorianBundle\Entity\ContactCardRole $contactCardRole = null)
    {
        $this->contactCardRole = $contactCardRole;

        return $this;
    }

    /**
     * Get contactCardRole
     *
     * @return \Oktolab\DelorianBundle\Entity\ContactCardRole 
     */
    public function getContactCardRole()
    {
        return $this->contactCardRole;
    }
}
