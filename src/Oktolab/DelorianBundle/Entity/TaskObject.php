<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskObject
 *
 * @ORM\Table(name="task_object", indexes={@ORM\Index(name="task_object_FI_1", columns={"task_object_type_id"}), @ORM\Index(name="task_object_FI_2", columns={"task_object_status_id"})})
 * @ORM\Entity
 */
class TaskObject
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
     * @var integer
     *
     * @ORM\Column(name="task_id", type="integer", nullable=false)
     */
    private $taskId;

    /**
     * @var string
     *
     * @ORM\Column(name="task_type", type="string", length=255, nullable=false)
     */
    private $taskType;

    /**
     * @var string
     *
     * @ORM\Column(name="arguments", type="text", nullable=false)
     */
    private $arguments;

    /**
     * @var string
     *
     * @ORM\Column(name="owner", type="string", length=255, nullable=false)
     */
    private $owner;

    /**
     * @var string
     *
     * @ORM\Column(name="options", type="text", nullable=false)
     */
    private $options;

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
     * @var \TaskObjectType
     *
     * @ORM\ManyToOne(targetEntity="TaskObjectType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_object_type_id", referencedColumnName="id")
     * })
     */
    private $taskObjectType;

    /**
     * @var \TaskObjectStatus
     *
     * @ORM\ManyToOne(targetEntity="TaskObjectStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_object_status_id", referencedColumnName="id")
     * })
     */
    private $taskObjectStatus;



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
     * @return TaskObject
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
     * Set taskId
     *
     * @param integer $taskId
     * @return TaskObject
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;

        return $this;
    }

    /**
     * Get taskId
     *
     * @return integer 
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * Set taskType
     *
     * @param string $taskType
     * @return TaskObject
     */
    public function setTaskType($taskType)
    {
        $this->taskType = $taskType;

        return $this;
    }

    /**
     * Get taskType
     *
     * @return string 
     */
    public function getTaskType()
    {
        return $this->taskType;
    }

    /**
     * Set arguments
     *
     * @param string $arguments
     * @return TaskObject
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * Get arguments
     *
     * @return string 
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Set owner
     *
     * @param string $owner
     * @return TaskObject
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set options
     *
     * @param string $options
     * @return TaskObject
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return string 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return TaskObject
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
     * @return TaskObject
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
     * Set taskObjectType
     *
     * @param \Oktolab\DelorianBundle\Entity\TaskObjectType $taskObjectType
     * @return TaskObject
     */
    public function setTaskObjectType(\Oktolab\DelorianBundle\Entity\TaskObjectType $taskObjectType = null)
    {
        $this->taskObjectType = $taskObjectType;

        return $this;
    }

    /**
     * Get taskObjectType
     *
     * @return \Oktolab\DelorianBundle\Entity\TaskObjectType 
     */
    public function getTaskObjectType()
    {
        return $this->taskObjectType;
    }

    /**
     * Set taskObjectStatus
     *
     * @param \Oktolab\DelorianBundle\Entity\TaskObjectStatus $taskObjectStatus
     * @return TaskObject
     */
    public function setTaskObjectStatus(\Oktolab\DelorianBundle\Entity\TaskObjectStatus $taskObjectStatus = null)
    {
        $this->taskObjectStatus = $taskObjectStatus;

        return $this;
    }

    /**
     * Get taskObjectStatus
     *
     * @return \Oktolab\DelorianBundle\Entity\TaskObjectStatus 
     */
    public function getTaskObjectStatus()
    {
        return $this->taskObjectStatus;
    }
}
