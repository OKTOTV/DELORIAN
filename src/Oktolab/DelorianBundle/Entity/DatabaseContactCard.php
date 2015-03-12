<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DatabaseContactCard
 *
 * @ORM\Table(name="database_contact_card", indexes={@ORM\Index(name="database_contact_card_I_1", columns={"guid"})})
 * @ORM\Entity
 */
class DatabaseContactCard
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
     * @ORM\Column(name="guid", type="string", length=255, nullable=false)
     */
    private $guid;

    /**
     * @var string
     *
     * @ORM\Column(name="card", type="text", nullable=false)
     */
    private $card;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_reuse", type="boolean", nullable=true)
     */
    private $allowReuse = '1';

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set guid
     *
     * @param string $guid
     * @return DatabaseContactCard
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * Get guid
     *
     * @return string 
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Set card
     *
     * @param string $card
     * @return DatabaseContactCard
     */
    public function setCard($card)
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Get card
     *
     * @return string 
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * Set allowReuse
     *
     * @param boolean $allowReuse
     * @return DatabaseContactCard
     */
    public function setAllowReuse($allowReuse)
    {
        $this->allowReuse = $allowReuse;

        return $this;
    }

    /**
     * Get allowReuse
     *
     * @return boolean 
     */
    public function getAllowReuse()
    {
        return $this->allowReuse;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return DatabaseContactCard
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
     * @return DatabaseContactCard
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
}
