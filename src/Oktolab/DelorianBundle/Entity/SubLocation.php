<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubLocation
 *
 * @ORM\Table(name="sub_location", uniqueConstraints={@ORM\UniqueConstraint(name="sub_location_U_1", columns={"name"})}, indexes={@ORM\Index(name="sub_location_FI_1", columns={"main_location_id"})})
 * @ORM\Entity
 */
class SubLocation
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="protocol", type="string", length=20, nullable=false)
     */
    private $protocol = 'ssh';

    /**
     * @var string
     *
     * @ORM\Column(name="base_path", type="string", length=255, nullable=true)
     */
    private $basePath = '/';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_online", type="boolean", nullable=true)
     */
    private $isOnline = '0';

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
     * @var \MainLocation
     *
     * @ORM\ManyToOne(targetEntity="MainLocation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="main_location_id", referencedColumnName="id")
     * })
     */
    private $mainLocation;



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
     * @return SubLocation
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
     * Set title
     *
     * @param string $title
     * @return SubLocation
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
     * Set description
     *
     * @param string $description
     * @return SubLocation
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
     * Set address
     *
     * @param string $address
     * @return SubLocation
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set protocol
     *
     * @param string $protocol
     * @return SubLocation
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * Get protocol
     *
     * @return string 
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Set basePath
     *
     * @param string $basePath
     * @return SubLocation
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;

        return $this;
    }

    /**
     * Get basePath
     *
     * @return string 
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * Set isOnline
     *
     * @param boolean $isOnline
     * @return SubLocation
     */
    public function setIsOnline($isOnline)
    {
        $this->isOnline = $isOnline;

        return $this;
    }

    /**
     * Get isOnline
     *
     * @return boolean 
     */
    public function getIsOnline()
    {
        return $this->isOnline;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return SubLocation
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
     * @return SubLocation
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
     * Set mainLocation
     *
     * @param \Oktolab\DelorianBundle\Entity\MainLocation $mainLocation
     * @return SubLocation
     */
    public function setMainLocation(\Oktolab\DelorianBundle\Entity\MainLocation $mainLocation = null)
    {
        $this->mainLocation = $mainLocation;

        return $this;
    }

    /**
     * Get mainLocation
     *
     * @return \Oktolab\DelorianBundle\Entity\MainLocation 
     */
    public function getMainLocation()
    {
        return $this->mainLocation;
    }
}
