<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SearchKey
 *
 * @ORM\Table(name="search_key", uniqueConstraints={@ORM\UniqueConstraint(name="search_key_U_1", columns={"key_text"})})
 * @ORM\Entity
 */
class SearchKey
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
     * @ORM\Column(name="key_text", type="string", length=255, nullable=false)
     */
    private $keyText;



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
     * Set keyText
     *
     * @param string $keyText
     * @return SearchKey
     */
    public function setKeyText($keyText)
    {
        $this->keyText = $keyText;

        return $this;
    }

    /**
     * Get keyText
     *
     * @return string 
     */
    public function getKeyText()
    {
        return $this->keyText;
    }
}
