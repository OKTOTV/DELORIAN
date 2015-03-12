<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationField
 *
 * @ORM\Table(name="evaluation_field", indexes={@ORM\Index(name="evaluation_field_FI_1", columns={"evaluation_sheet_id"}), @ORM\Index(name="evaluation_field_FI_2", columns={"evaluation_field_template_id"})})
 * @ORM\Entity
 */
class EvaluationField
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
     * @ORM\Column(name="value", type="integer", nullable=true)
     */
    private $value;

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
     * @var \EvaluationSheet
     *
     * @ORM\ManyToOne(targetEntity="EvaluationSheet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evaluation_sheet_id", referencedColumnName="id")
     * })
     */
    private $evaluationSheet;

    /**
     * @var \EvaluationFieldTemplate
     *
     * @ORM\ManyToOne(targetEntity="EvaluationFieldTemplate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evaluation_field_template_id", referencedColumnName="id")
     * })
     */
    private $evaluationFieldTemplate;



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
     * Set value
     *
     * @param integer $value
     * @return EvaluationField
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return EvaluationField
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
     * @return EvaluationField
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
     * @return EvaluationField
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
     * Set evaluationSheet
     *
     * @param \Oktolab\DelorianBundle\Entity\EvaluationSheet $evaluationSheet
     * @return EvaluationField
     */
    public function setEvaluationSheet(\Oktolab\DelorianBundle\Entity\EvaluationSheet $evaluationSheet = null)
    {
        $this->evaluationSheet = $evaluationSheet;

        return $this;
    }

    /**
     * Get evaluationSheet
     *
     * @return \Oktolab\DelorianBundle\Entity\EvaluationSheet 
     */
    public function getEvaluationSheet()
    {
        return $this->evaluationSheet;
    }

    /**
     * Set evaluationFieldTemplate
     *
     * @param \Oktolab\DelorianBundle\Entity\EvaluationFieldTemplate $evaluationFieldTemplate
     * @return EvaluationField
     */
    public function setEvaluationFieldTemplate(\Oktolab\DelorianBundle\Entity\EvaluationFieldTemplate $evaluationFieldTemplate = null)
    {
        $this->evaluationFieldTemplate = $evaluationFieldTemplate;

        return $this;
    }

    /**
     * Get evaluationFieldTemplate
     *
     * @return \Oktolab\DelorianBundle\Entity\EvaluationFieldTemplate 
     */
    public function getEvaluationFieldTemplate()
    {
        return $this->evaluationFieldTemplate;
    }
}
