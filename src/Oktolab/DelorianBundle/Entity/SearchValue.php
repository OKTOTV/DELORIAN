<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SearchValue
 *
 * @ORM\Table(name="search_value", uniqueConstraints={@ORM\UniqueConstraint(name="search_value_U_1", columns={"value_text"})})
 * @ORM\Entity
 */
class SearchValue
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
     * @ORM\Column(name="value_text", type="string", length=255, nullable=false)
     */
    private $valueText;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_common", type="boolean", nullable=true)
     */
    private $isCommon = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="value_count", type="integer", nullable=true)
     */
    private $valueCount = '0';



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
     * Set valueText
     *
     * @param string $valueText
     * @return SearchValue
     */
    public function setValueText($valueText)
    {
        $this->valueText = $valueText;

        return $this;
    }

    /**
     * Get valueText
     *
     * @return string 
     */
    public function getValueText()
    {
        return $this->valueText;
    }

    /**
     * Set isCommon
     *
     * @param boolean $isCommon
     * @return SearchValue
     */
    public function setIsCommon($isCommon)
    {
        $this->isCommon = $isCommon;

        return $this;
    }

    /**
     * Get isCommon
     *
     * @return boolean 
     */
    public function getIsCommon()
    {
        return $this->isCommon;
    }

    /**
     * Set valueCount
     *
     * @param integer $valueCount
     * @return SearchValue
     */
    public function setValueCount($valueCount)
    {
        $this->valueCount = $valueCount;

        return $this;
    }

    /**
     * Get valueCount
     *
     * @return integer 
     */
    public function getValueCount()
    {
        return $this->valueCount;
    }
}
