<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogCode
 *
 * @ORM\Table(name="log_code", uniqueConstraints={@ORM\UniqueConstraint(name="log_code_U_1", columns={"name"})}, indexes={@ORM\Index(name="log_code_I_1", columns={"class_name1"}), @ORM\Index(name="log_code_I_2", columns={"class_name2"}), @ORM\Index(name="log_code_I_3", columns={"class_name3"}), @ORM\Index(name="log_code_I_4", columns={"class_name4"})})
 * @ORM\Entity
 */
class LogCode
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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="class_name1", type="string", length=255, nullable=true)
     */
    private $className1;

    /**
     * @var string
     *
     * @ORM\Column(name="class_name2", type="string", length=255, nullable=true)
     */
    private $className2;

    /**
     * @var string
     *
     * @ORM\Column(name="class_name3", type="string", length=255, nullable=true)
     */
    private $className3;

    /**
     * @var string
     *
     * @ORM\Column(name="class_name4", type="string", length=255, nullable=true)
     */
    private $className4;

    /**
     * @var integer
     *
     * @ORM\Column(name="log_level", type="integer", nullable=true)
     */
    private $logLevel = '40';



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
     * @return LogCode
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
     * @return LogCode
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
     * Set className1
     *
     * @param string $className1
     * @return LogCode
     */
    public function setClassName1($className1)
    {
        $this->className1 = $className1;

        return $this;
    }

    /**
     * Get className1
     *
     * @return string 
     */
    public function getClassName1()
    {
        return $this->className1;
    }

    /**
     * Set className2
     *
     * @param string $className2
     * @return LogCode
     */
    public function setClassName2($className2)
    {
        $this->className2 = $className2;

        return $this;
    }

    /**
     * Get className2
     *
     * @return string 
     */
    public function getClassName2()
    {
        return $this->className2;
    }

    /**
     * Set className3
     *
     * @param string $className3
     * @return LogCode
     */
    public function setClassName3($className3)
    {
        $this->className3 = $className3;

        return $this;
    }

    /**
     * Get className3
     *
     * @return string 
     */
    public function getClassName3()
    {
        return $this->className3;
    }

    /**
     * Set className4
     *
     * @param string $className4
     * @return LogCode
     */
    public function setClassName4($className4)
    {
        $this->className4 = $className4;

        return $this;
    }

    /**
     * Get className4
     *
     * @return string 
     */
    public function getClassName4()
    {
        return $this->className4;
    }

    /**
     * Set logLevel
     *
     * @param integer $logLevel
     * @return LogCode
     */
    public function setLogLevel($logLevel)
    {
        $this->logLevel = $logLevel;

        return $this;
    }

    /**
     * Get logLevel
     *
     * @return integer 
     */
    public function getLogLevel()
    {
        return $this->logLevel;
    }
}
