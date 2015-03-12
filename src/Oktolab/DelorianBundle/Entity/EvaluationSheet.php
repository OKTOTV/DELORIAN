<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationSheet
 *
 * @ORM\Table(name="evaluation_sheet", uniqueConstraints={@ORM\UniqueConstraint(name="template_and_id", columns={"evaluation_sheet_template_id", "remote_id"})}, indexes={@ORM\Index(name="evaluation_sheet_FI_2", columns={"evaluated_by"}), @ORM\Index(name="IDX_42CBEC137DF56DFD", columns={"evaluation_sheet_template_id"})})
 * @ORM\Entity
 */
class EvaluationSheet
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
     * @ORM\Column(name="remote_id", type="integer", nullable=false)
     */
    private $remoteId;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="evaluated_at", type="datetime", nullable=true)
     */
    private $evaluatedAt;

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
     * @var \EvaluationSheetTemplate
     *
     * @ORM\ManyToOne(targetEntity="EvaluationSheetTemplate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evaluation_sheet_template_id", referencedColumnName="id")
     * })
     */
    private $evaluationSheetTemplate;

    /**
     * @var \SfGuardUser
     *
     * @ORM\ManyToOne(targetEntity="SfGuardUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evaluated_by", referencedColumnName="id")
     * })
     */
    private $evaluatedBy;



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
     * Set remoteId
     *
     * @param integer $remoteId
     * @return EvaluationSheet
     */
    public function setRemoteId($remoteId)
    {
        $this->remoteId = $remoteId;

        return $this;
    }

    /**
     * Get remoteId
     *
     * @return integer 
     */
    public function getRemoteId()
    {
        return $this->remoteId;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return EvaluationSheet
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
     * Set evaluatedAt
     *
     * @param \DateTime $evaluatedAt
     * @return EvaluationSheet
     */
    public function setEvaluatedAt($evaluatedAt)
    {
        $this->evaluatedAt = $evaluatedAt;

        return $this;
    }

    /**
     * Get evaluatedAt
     *
     * @return \DateTime 
     */
    public function getEvaluatedAt()
    {
        return $this->evaluatedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return EvaluationSheet
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
     * @return EvaluationSheet
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
     * Set evaluationSheetTemplate
     *
     * @param \Oktolab\DelorianBundle\Entity\EvaluationSheetTemplate $evaluationSheetTemplate
     * @return EvaluationSheet
     */
    public function setEvaluationSheetTemplate(\Oktolab\DelorianBundle\Entity\EvaluationSheetTemplate $evaluationSheetTemplate = null)
    {
        $this->evaluationSheetTemplate = $evaluationSheetTemplate;

        return $this;
    }

    /**
     * Get evaluationSheetTemplate
     *
     * @return \Oktolab\DelorianBundle\Entity\EvaluationSheetTemplate 
     */
    public function getEvaluationSheetTemplate()
    {
        return $this->evaluationSheetTemplate;
    }

    /**
     * Set evaluatedBy
     *
     * @param \Oktolab\DelorianBundle\Entity\SfGuardUser $evaluatedBy
     * @return EvaluationSheet
     */
    public function setEvaluatedBy(\Oktolab\DelorianBundle\Entity\SfGuardUser $evaluatedBy = null)
    {
        $this->evaluatedBy = $evaluatedBy;

        return $this;
    }

    /**
     * Get evaluatedBy
     *
     * @return \Oktolab\DelorianBundle\Entity\SfGuardUser 
     */
    public function getEvaluatedBy()
    {
        return $this->evaluatedBy;
    }
}
