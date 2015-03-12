<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClipAudio
 *
 * @ORM\Table(name="clip_audio", indexes={@ORM\Index(name="clip_audio_FI_1", columns={"clip_id"})})
 * @ORM\Entity
 */
class ClipAudio
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="interpreter", type="string", length=255, nullable=true)
     */
    private $interpreter;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="lc_number", type="string", length=255, nullable=true)
     */
    private $lcNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $length;

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
     * @return ClipAudio
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
     * Set title
     *
     * @param string $title
     * @return ClipAudio
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set interpreter
     *
     * @param string $interpreter
     * @return ClipAudio
     */
    public function setInterpreter($interpreter)
    {
        $this->interpreter = $interpreter;

        return $this;
    }

    /**
     * Get interpreter
     *
     * @return string 
     */
    public function getInterpreter()
    {
        return $this->interpreter;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return ClipAudio
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set lcNumber
     *
     * @param string $lcNumber
     * @return ClipAudio
     */
    public function setLcNumber($lcNumber)
    {
        $this->lcNumber = $lcNumber;

        return $this;
    }

    /**
     * Get lcNumber
     *
     * @return string 
     */
    public function getLcNumber()
    {
        return $this->lcNumber;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return ClipAudio
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set clip
     *
     * @param \Oktolab\DelorianBundle\Entity\Clip $clip
     * @return ClipAudio
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
}
