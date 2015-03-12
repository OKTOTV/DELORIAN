<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClipCredit
 *
 * @ORM\Table(name="clip_credit", indexes={@ORM\Index(name="clip_credit_FI_1", columns={"clip_id"}), @ORM\Index(name="clip_credit_FI_2", columns={"team_role_id"})})
 * @ORM\Entity
 */
class ClipCredit
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
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255, nullable=true)
     */
    private $contact;

    /**
     * @var \Clip
     *
     * @ORM\ManyToOne(targetEntity="Clip")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clip_id", referencedColumnName="id")
     * })
     */
    private $clip;

    /**
     * @var \TeamRole
     *
     * @ORM\ManyToOne(targetEntity="TeamRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_role_id", referencedColumnName="id")
     * })
     */
    private $teamRole;



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
     * Set position
     *
     * @param integer $position
     * @return ClipCredit
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return ClipCredit
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set clip
     *
     * @param \Oktolab\DelorianBundle\Entity\Clip $clip
     * @return ClipCredit
     */
    public function setClip(\Oktolab\DelorianBundle\Entity\Clip $clip = null)
    {
        $this->clip = $clip;

        return $this;
    }

    /**
     * Get clip
     *
     * @return \Oktolab\DelorianBundle\Entity\Clip 
     */
    public function getClip()
    {
        return $this->clip;
    }

    /**
     * Set teamRole
     *
     * @param \Oktolab\DelorianBundle\Entity\TeamRole $teamRole
     * @return ClipCredit
     */
    public function setTeamRole(\Oktolab\DelorianBundle\Entity\TeamRole $teamRole = null)
    {
        $this->teamRole = $teamRole;

        return $this;
    }

    /**
     * Get teamRole
     *
     * @return \Oktolab\DelorianBundle\Entity\TeamRole 
     */
    public function getTeamRole()
    {
        return $this->teamRole;
    }
}
