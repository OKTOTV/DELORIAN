<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationSheetTemplate
 *
 * @ORM\Table(name="evaluation_sheet_template", uniqueConstraints={@ORM\UniqueConstraint(name="evaluation_sheet_template_U_1", columns={"name"})}, indexes={@ORM\Index(name="evaluation_sheet_template_I_1", columns={"model_class_name"})})
 * @ORM\Entity
 */
class EvaluationSheetTemplate
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
     * @ORM\Column(name="model_class_name", type="string", length=255, nullable=false)
     */
    private $modelClassName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;



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
     * @return EvaluationSheetTemplate
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
     * Set modelClassName
     *
     * @param string $modelClassName
     * @return EvaluationSheetTemplate
     */
    public function setModelClassName($modelClassName)
    {
        $this->modelClassName = $modelClassName;

        return $this;
    }

    /**
     * Get modelClassName
     *
     * @return string 
     */
    public function getModelClassName()
    {
        return $this->modelClassName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return EvaluationSheetTemplate
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
}
