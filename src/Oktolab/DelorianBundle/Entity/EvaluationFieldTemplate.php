<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationFieldTemplate
 *
 * @ORM\Table(name="evaluation_field_template", indexes={@ORM\Index(name="evaluation_field_template_FI_1", columns={"evaluation_sheet_template_id"})})
 * @ORM\Entity
 */
class EvaluationFieldTemplate
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="min_value", type="integer", nullable=true)
     */
    private $minValue = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="max_value", type="integer", nullable=true)
     */
    private $maxValue = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     */
    private $weight = '100';

    /**
     * @var boolean
     *
     * @ORM\Column(name="countable", type="boolean", nullable=true)
     */
    private $countable = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="score_group", type="string", length=20, nullable=true)
     */
    private $scoreGroup = 'default';

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_comments", type="boolean", nullable=true)
     */
    private $allowComments = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position = '10';

    /**
     * @var integer
     *
     * @ORM\Column(name="group_number", type="integer", nullable=true)
     */
    private $groupNumber = '0';

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
     * @return EvaluationFieldTemplate
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
     * @return EvaluationFieldTemplate
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
     * Set minValue
     *
     * @param integer $minValue
     * @return EvaluationFieldTemplate
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;

        return $this;
    }

    /**
     * Get minValue
     *
     * @return integer 
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * Set maxValue
     *
     * @param integer $maxValue
     * @return EvaluationFieldTemplate
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;

        return $this;
    }

    /**
     * Get maxValue
     *
     * @return integer 
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return EvaluationFieldTemplate
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set countable
     *
     * @param boolean $countable
     * @return EvaluationFieldTemplate
     */
    public function setCountable($countable)
    {
        $this->countable = $countable;

        return $this;
    }

    /**
     * Get countable
     *
     * @return boolean 
     */
    public function getCountable()
    {
        return $this->countable;
    }

    /**
     * Set scoreGroup
     *
     * @param string $scoreGroup
     * @return EvaluationFieldTemplate
     */
    public function setScoreGroup($scoreGroup)
    {
        $this->scoreGroup = $scoreGroup;

        return $this;
    }

    /**
     * Get scoreGroup
     *
     * @return string 
     */
    public function getScoreGroup()
    {
        return $this->scoreGroup;
    }

    /**
     * Set allowComments
     *
     * @param boolean $allowComments
     * @return EvaluationFieldTemplate
     */
    public function setAllowComments($allowComments)
    {
        $this->allowComments = $allowComments;

        return $this;
    }

    /**
     * Get allowComments
     *
     * @return boolean 
     */
    public function getAllowComments()
    {
        return $this->allowComments;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return EvaluationFieldTemplate
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
     * Set groupNumber
     *
     * @param integer $groupNumber
     * @return EvaluationFieldTemplate
     */
    public function setGroupNumber($groupNumber)
    {
        $this->groupNumber = $groupNumber;

        return $this;
    }

    /**
     * Get groupNumber
     *
     * @return integer 
     */
    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    /**
     * Set evaluationSheetTemplate
     *
     * @param \Oktolab\DelorianBundle\Entity\EvaluationSheetTemplate $evaluationSheetTemplate
     * @return EvaluationFieldTemplate
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
}
