<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogEntry
 *
 * @ORM\Table(name="log_entry", indexes={@ORM\Index(name="log_entry_I_1", columns={"reference1"}), @ORM\Index(name="log_entry_I_2", columns={"reference2"}), @ORM\Index(name="log_entry_I_3", columns={"reference3"}), @ORM\Index(name="log_entry_I_4", columns={"reference4"}), @ORM\Index(name="log_entry_FI_1", columns={"log_code_id"}), @ORM\Index(name="log_entry_FI_2", columns={"log_domain_id"}), @ORM\Index(name="log_entry_FI_3", columns={"log_entry_text_id"}), @ORM\Index(name="log_entry_FI_4", columns={"user_id"})})
 * @ORM\Entity
 */
class LogEntry
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
     * @ORM\Column(name="reference1", type="integer", nullable=true)
     */
    private $reference1;

    /**
     * @var integer
     *
     * @ORM\Column(name="reference2", type="integer", nullable=true)
     */
    private $reference2;

    /**
     * @var integer
     *
     * @ORM\Column(name="reference3", type="integer", nullable=true)
     */
    private $reference3;

    /**
     * @var integer
     *
     * @ORM\Column(name="reference4", type="integer", nullable=true)
     */
    private $reference4;

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
     * @var \LogCode
     *
     * @ORM\ManyToOne(targetEntity="LogCode")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="log_code_id", referencedColumnName="id")
     * })
     */
    private $logCode;

    /**
     * @var \LogDomain
     *
     * @ORM\ManyToOne(targetEntity="LogDomain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="log_domain_id", referencedColumnName="id")
     * })
     */
    private $logDomain;

    /**
     * @var \LogEntryText
     *
     * @ORM\ManyToOne(targetEntity="LogEntryText")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="log_entry_text_id", referencedColumnName="id")
     * })
     */
    private $logEntryText;

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
     * Set reference1
     *
     * @param integer $reference1
     * @return LogEntry
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
     * @return LogEntry
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
     * Set reference3
     *
     * @param integer $reference3
     * @return LogEntry
     */
    public function setReference3($reference3)
    {
        $this->reference3 = $reference3;

        return $this;
    }

    /**
     * Get reference3
     *
     * @return integer 
     */
    public function getReference3()
    {
        return $this->reference3;
    }

    /**
     * Set reference4
     *
     * @param integer $reference4
     * @return LogEntry
     */
    public function setReference4($reference4)
    {
        $this->reference4 = $reference4;

        return $this;
    }

    /**
     * Get reference4
     *
     * @return integer 
     */
    public function getReference4()
    {
        return $this->reference4;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return LogEntry
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
     * @return LogEntry
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
     * Set logCode
     *
     * @param \Oktolab\DelorianBundle\Entity\LogCode $logCode
     * @return LogEntry
     */
    public function setLogCode(\Oktolab\DelorianBundle\Entity\LogCode $logCode = null)
    {
        $this->logCode = $logCode;

        return $this;
    }

    /**
     * Get logCode
     *
     * @return \Oktolab\DelorianBundle\Entity\LogCode 
     */
    public function getLogCode()
    {
        return $this->logCode;
    }

    /**
     * Set logDomain
     *
     * @param \Oktolab\DelorianBundle\Entity\LogDomain $logDomain
     * @return LogEntry
     */
    public function setLogDomain(\Oktolab\DelorianBundle\Entity\LogDomain $logDomain = null)
    {
        $this->logDomain = $logDomain;

        return $this;
    }

    /**
     * Get logDomain
     *
     * @return \Oktolab\DelorianBundle\Entity\LogDomain 
     */
    public function getLogDomain()
    {
        return $this->logDomain;
    }

    /**
     * Set logEntryText
     *
     * @param \Oktolab\DelorianBundle\Entity\LogEntryText $logEntryText
     * @return LogEntry
     */
    public function setLogEntryText(\Oktolab\DelorianBundle\Entity\LogEntryText $logEntryText = null)
    {
        $this->logEntryText = $logEntryText;

        return $this;
    }

    /**
     * Get logEntryText
     *
     * @return \Oktolab\DelorianBundle\Entity\LogEntryText 
     */
    public function getLogEntryText()
    {
        return $this->logEntryText;
    }

    /**
     * Set user
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $user
     * @return LogEntry
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
