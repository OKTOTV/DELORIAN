<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SearchMatch
 *
 * @ORM\Table(name="search_match", indexes={@ORM\Index(name="search_match_I_1", columns={"reference"}), @ORM\Index(name="search_match_FI_1", columns={"search_value_id"}), @ORM\Index(name="search_match_FI_2", columns={"search_key_id"}), @ORM\Index(name="search_match_FI_3", columns={"search_object_type_id"})})
 * @ORM\Entity
 */
class SearchMatch
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
     * @var \SearchValue
     *
     * @ORM\ManyToOne(targetEntity="SearchValue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="search_value_id", referencedColumnName="id")
     * })
     */
    private $searchValue;

    /**
     * @var \SearchKey
     *
     * @ORM\ManyToOne(targetEntity="SearchKey")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="search_key_id", referencedColumnName="id")
     * })
     */
    private $searchKey;

    /**
     * @var \SearchObjectType
     *
     * @ORM\ManyToOne(targetEntity="SearchObjectType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="search_object_type_id", referencedColumnName="id")
     * })
     */
    private $searchObjectType;



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
     * @return SearchMatch
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
     * Set searchValue
     *
     * @param \Oktolab\DelorianBundle\Entity\SearchValue $searchValue
     * @return SearchMatch
     */
    public function setSearchValue(\Oktolab\DelorianBundle\Entity\SearchValue $searchValue = null)
    {
        $this->searchValue = $searchValue;

        return $this;
    }

    /**
     * Get searchValue
     *
     * @return \Oktolab\DelorianBundle\Entity\SearchValue 
     */
    public function getSearchValue()
    {
        return $this->searchValue;
    }

    /**
     * Set searchKey
     *
     * @param \Oktolab\DelorianBundle\Entity\SearchKey $searchKey
     * @return SearchMatch
     */
    public function setSearchKey(\Oktolab\DelorianBundle\Entity\SearchKey $searchKey = null)
    {
        $this->searchKey = $searchKey;

        return $this;
    }

    /**
     * Get searchKey
     *
     * @return \Oktolab\DelorianBundle\Entity\SearchKey 
     */
    public function getSearchKey()
    {
        return $this->searchKey;
    }

    /**
     * Set searchObjectType
     *
     * @param \Oktolab\DelorianBundle\Entity\SearchObjectType $searchObjectType
     * @return SearchMatch
     */
    public function setSearchObjectType(\Oktolab\DelorianBundle\Entity\SearchObjectType $searchObjectType = null)
    {
        $this->searchObjectType = $searchObjectType;

        return $this;
    }

    /**
     * Get searchObjectType
     *
     * @return \Oktolab\DelorianBundle\Entity\SearchObjectType 
     */
    public function getSearchObjectType()
    {
        return $this->searchObjectType;
    }
}
