<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contract
 *
 * @ORM\Table(name="contract", indexes={@ORM\Index(name="contract_FI_1", columns={"contract_type_id"}), @ORM\Index(name="contract_FI_2", columns={"signee"}), @ORM\Index(name="contract_FI_3", columns={"series_id"})})
 * @ORM\Entity
 */
class Contract
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
     * @ORM\Column(name="contact1", type="string", length=255, nullable=true)
     */
    private $contact1;

    /**
     * @var string
     *
     * @ORM\Column(name="contact2", type="string", length=255, nullable=true)
     */
    private $contact2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     */
    private $endDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="contract_signed", type="boolean", nullable=true)
     */
    private $contractSigned;

    /**
     * @var string
     *
     * @ORM\Column(name="custom_broadcast_rules", type="text", nullable=true)
     */
    private $customBroadcastRules;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

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
     * @var \ContractType
     *
     * @ORM\ManyToOne(targetEntity="ContractType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contract_type_id", referencedColumnName="id")
     * })
     */
    private $contractType;

    /**
     * @var \DatabaseContactCard
     *
     * @ORM\ManyToOne(targetEntity="DatabaseContactCard")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="signee", referencedColumnName="id")
     * })
     */
    private $signee;

    /**
     * @var \Series
     *
     * @ORM\ManyToOne(targetEntity="Series")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="series_id", referencedColumnName="id")
     * })
     */
    private $series;



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
     * Set contact1
     *
     * @param string $contact1
     * @return Contract
     */
    public function setContact1($contact1)
    {
        $this->contact1 = $contact1;

        return $this;
    }

    /**
     * Get contact1
     *
     * @return string 
     */
    public function getContact1()
    {
        return $this->contact1;
    }

    /**
     * Set contact2
     *
     * @param string $contact2
     * @return Contract
     */
    public function setContact2($contact2)
    {
        $this->contact2 = $contact2;

        return $this;
    }

    /**
     * Get contact2
     *
     * @return string 
     */
    public function getContact2()
    {
        return $this->contact2;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Contract
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Contract
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set contractSigned
     *
     * @param boolean $contractSigned
     * @return Contract
     */
    public function setContractSigned($contractSigned)
    {
        $this->contractSigned = $contractSigned;

        return $this;
    }

    /**
     * Get contractSigned
     *
     * @return boolean 
     */
    public function getContractSigned()
    {
        return $this->contractSigned;
    }

    /**
     * Set customBroadcastRules
     *
     * @param string $customBroadcastRules
     * @return Contract
     */
    public function setCustomBroadcastRules($customBroadcastRules)
    {
        $this->customBroadcastRules = $customBroadcastRules;

        return $this;
    }

    /**
     * Get customBroadcastRules
     *
     * @return string 
     */
    public function getCustomBroadcastRules()
    {
        return $this->customBroadcastRules;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Contract
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Contract
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
     * @return Contract
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
     * Set contractType
     *
     * @param \Oktolab\DelorianBundle\Entity\ContractType $contractType
     * @return Contract
     */
    public function setContractType(\Oktolab\DelorianBundle\Entity\ContractType $contractType = null)
    {
        $this->contractType = $contractType;

        return $this;
    }

    /**
     * Get contractType
     *
     * @return \Oktolab\DelorianBundle\Entity\ContractType 
     */
    public function getContractType()
    {
        return $this->contractType;
    }

    /**
     * Set signee
     *
     * @param \Oktolab\DelorianBundle\Entity\DatabaseContactCard $signee
     * @return Contract
     */
    public function setSignee(\Oktolab\DelorianBundle\Entity\DatabaseContactCard $signee = null)
    {
        $this->signee = $signee;

        return $this;
    }

    /**
     * Get signee
     *
     * @return \Oktolab\DelorianBundle\Entity\DatabaseContactCard 
     */
    public function getSignee()
    {
        return $this->signee;
    }

    /**
     * Set series
     *
     * @param \Oktolab\DelorianBundle\Entity\Series $series
     * @return Contract
     */
    public function setSeries(\Oktolab\DelorianBundle\Entity\Series $series = null)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return \Oktolab\DelorianBundle\Entity\Series 
     */
    public function getSeries()
    {
        return $this->series;
    }
}
