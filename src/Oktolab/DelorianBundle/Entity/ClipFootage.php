<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClipFootage
 *
 * @ORM\Table(name="clip_footage", indexes={@ORM\Index(name="clip_footage_FI_1", columns={"clip_id"})})
 * @ORM\Entity
 */
class ClipFootage
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
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

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
     * @return ClipFootage
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
     * Set description
     *
     * @param string $description
     * @return ClipFootage
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
     * Set clip
     *
     * @param \Oktolab\DelorianBundle\Entity\Clip $clip
     * @return ClipFootage
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
