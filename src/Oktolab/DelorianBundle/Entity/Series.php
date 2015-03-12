<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Series
 *
 * @ExclusionPolicy("all")
 * 
 * @ORM\Table(name="series", options={"collate"="utf8_unicode_ci"}, uniqueConstraints={@ORM\UniqueConstraint(name="series_U_1", columns={"abbrevation"})}, indexes={@ORM\Index(name="series_FI_1", columns={"series_status_id"}), @ORM\Index(name="series_FI_2", columns={"episode_name_schema_id"}), @ORM\Index(name="series_FI_3", columns={"contact"}), @ORM\Index(name="series_FI_4", columns={"tutor"}), @ORM\Index(name="series_FI_5", columns={"default_licence_type_id"})})
 * @ORM\Entity
 */
class Series
{
    /**
     * @var integer
     *
     * @Expose
     * 
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Expose
     * 
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="status_comments", type="text", nullable=true)
     */
    private $statusComments;

    /**
     * @var string
     *
     * @ORM\Column(name="abbrevation", type="string", length=20, nullable=false)
     */
    private $abbrevation;

    /**
     * @var string
     *
     * @ORM\Column(name="web_abbrevation", type="string", length=32, nullable=true)
     */
    private $webAbbrevation;

    /**
     * @var integer
     *
     * @ORM\Column(name="teletext_page", type="integer", nullable=true)
     */
    private $teletextPage;

    /**
     * @var integer
     *
     * @ORM\Column(name="default_length", type="integer", nullable=true)
     */
    private $defaultLength;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_producer", type="string", length=255, nullable=true)
     */
    private $contactProducer;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_local", type="string", length=255, nullable=true)
     */
    private $contactLocal;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract_text", type="text", nullable=true)
     */
    private $abstractText;

    /**
     * @var string
     *
     * @Expose
     * 
     * @ORM\Column(name="abstract_text_public", type="text", nullable=true)
     */
    private $abstractTextPublic;

    /**
     * @var string
     *
     * @ORM\Column(name="promo_text", type="text", nullable=true)
     */
    private $promoText;

    /**
     * @var string
     *
     * @ORM\Column(name="promo_text_public", type="text", nullable=true)
     */
    private $promoTextPublic;

    /**
     * @var integer
     *
     * @ORM\Column(name="image_id", type="integer", nullable=true)
     */
    private $imageId;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable_online_publishing", type="boolean", nullable=true)
     */
    private $enableOnlinePublishing;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable_blog", type="boolean", nullable=false)
     */
    private $enableBlog = '0';

    /**
     * @var \DateTime
     *
     * @Expose
     * 
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Expose
     * 
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \SeriesStatus
     *
     * @ORM\ManyToOne(targetEntity="SeriesStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="series_status_id", referencedColumnName="id")
     * })
     */
    private $seriesStatus;

    /**
     * @var \EpisodeNameSchema
     *
     * @ORM\ManyToOne(targetEntity="EpisodeNameSchema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="episode_name_schema_id", referencedColumnName="id")
     * })
     */
    private $episodeNameSchema;

    /**
     * @var \DatabaseContactCard
     *
     * @ORM\ManyToOne(targetEntity="DatabaseContactCard")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact", referencedColumnName="id")
     * })
     */
    private $contact;

    /**
     * @var \DatabaseContactCard
     *
     * @ORM\ManyToOne(targetEntity="DatabaseContactCard")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tutor", referencedColumnName="id")
     * })
     */
    private $tutor;

    /**
     * @var \LicenceType
     *
     * @ORM\ManyToOne(targetEntity="LicenceType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="default_licence_type_id", referencedColumnName="id")
     * })
     */
    private $defaultLicenceType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SeriesCategory", inversedBy="series")
     * @ORM\JoinTable(name="series_category_series",
     *   joinColumns={
     *     @ORM\JoinColumn(name="series_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="series_category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $seriesCategory;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ContentKeyword", inversedBy="series")
     * @ORM\JoinTable(name="series_content_keyword",
     *   joinColumns={
     *     @ORM\JoinColumn(name="series_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="content_keyword_id", referencedColumnName="id")
     *   }
     * )
     */
    private $contentKeyword;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ProcessKeyword", inversedBy="series")
     * @ORM\JoinTable(name="series_process_keyword",
     *   joinColumns={
     *     @ORM\JoinColumn(name="series_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="process_keyword_id", referencedColumnName="id")
     *   }
     * )
     */
    private $processKeyword;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->seriesCategory = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contentKeyword = new \Doctrine\Common\Collections\ArrayCollection();
        $this->processKeyword = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set title
     *
     * @param string $title
     * @return Series
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
     * Set subtitle
     *
     * @param string $subtitle
     * @return Series
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set statusComments
     *
     * @param string $statusComments
     * @return Series
     */
    public function setStatusComments($statusComments)
    {
        $this->statusComments = $statusComments;

        return $this;
    }

    /**
     * Get statusComments
     *
     * @return string 
     */
    public function getStatusComments()
    {
        return $this->statusComments;
    }

    /**
     * Set abbrevation
     *
     * @param string $abbrevation
     * @return Series
     */
    public function setAbbrevation($abbrevation)
    {
        $this->abbrevation = $abbrevation;

        return $this;
    }

    /**
     * Get abbrevation
     *
     * @return string 
     */
    public function getAbbrevation()
    {
        return $this->abbrevation;
    }

    /**
     * Set webAbbrevation
     *
     * @param string $webAbbrevation
     * @return Series
     */
    public function setWebAbbrevation($webAbbrevation)
    {
        $this->webAbbrevation = $webAbbrevation;

        return $this;
    }

    /**
     * Get webAbbrevation
     *
     * @return string 
     */
    public function getWebAbbrevation()
    {
        return $this->webAbbrevation;
    }

    /**
     * Set teletextPage
     *
     * @param integer $teletextPage
     * @return Series
     */
    public function setTeletextPage($teletextPage)
    {
        $this->teletextPage = $teletextPage;

        return $this;
    }

    /**
     * Get teletextPage
     *
     * @return integer 
     */
    public function getTeletextPage()
    {
        return $this->teletextPage;
    }

    /**
     * Set defaultLength
     *
     * @param integer $defaultLength
     * @return Series
     */
    public function setDefaultLength($defaultLength)
    {
        $this->defaultLength = $defaultLength;

        return $this;
    }

    /**
     * Get defaultLength
     *
     * @return integer 
     */
    public function getDefaultLength()
    {
        return $this->defaultLength;
    }

    /**
     * Set contactProducer
     *
     * @param string $contactProducer
     * @return Series
     */
    public function setContactProducer($contactProducer)
    {
        $this->contactProducer = $contactProducer;

        return $this;
    }

    /**
     * Get contactProducer
     *
     * @return string 
     */
    public function getContactProducer()
    {
        return $this->contactProducer;
    }

    /**
     * Set contactLocal
     *
     * @param string $contactLocal
     * @return Series
     */
    public function setContactLocal($contactLocal)
    {
        $this->contactLocal = $contactLocal;

        return $this;
    }

    /**
     * Get contactLocal
     *
     * @return string 
     */
    public function getContactLocal()
    {
        return $this->contactLocal;
    }

    /**
     * Set abstractText
     *
     * @param string $abstractText
     * @return Series
     */
    public function setAbstractText($abstractText)
    {
        $this->abstractText = $abstractText;

        return $this;
    }

    /**
     * Get abstractText
     *
     * @return string 
     */
    public function getAbstractText()
    {
        return $this->abstractText;
    }

    /**
     * Set abstractTextPublic
     *
     * @param string $abstractTextPublic
     * @return Series
     */
    public function setAbstractTextPublic($abstractTextPublic)
    {
        $this->abstractTextPublic = $abstractTextPublic;

        return $this;
    }

    /**
     * Get abstractTextPublic
     *
     * @return string 
     */
    public function getAbstractTextPublic()
    {
        return $this->abstractTextPublic;
    }

    /**
     * Set promoText
     *
     * @param string $promoText
     * @return Series
     */
    public function setPromoText($promoText)
    {
        $this->promoText = $promoText;

        return $this;
    }

    /**
     * Get promoText
     *
     * @return string 
     */
    public function getPromoText()
    {
        return $this->promoText;
    }

    /**
     * Set promoTextPublic
     *
     * @param string $promoTextPublic
     * @return Series
     */
    public function setPromoTextPublic($promoTextPublic)
    {
        $this->promoTextPublic = $promoTextPublic;

        return $this;
    }

    /**
     * Get promoTextPublic
     *
     * @return string 
     */
    public function getPromoTextPublic()
    {
        return $this->promoTextPublic;
    }

    /**
     * Set imageId
     *
     * @param integer $imageId
     * @return Series
     */
    public function setImageId($imageId)
    {
        $this->imageId = $imageId;

        return $this;
    }

    /**
     * Get imageId
     *
     * @return integer 
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Series
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
     * Set enableOnlinePublishing
     *
     * @param boolean $enableOnlinePublishing
     * @return Series
     */
    public function setEnableOnlinePublishing($enableOnlinePublishing)
    {
        $this->enableOnlinePublishing = $enableOnlinePublishing;

        return $this;
    }

    /**
     * Get enableOnlinePublishing
     *
     * @return boolean 
     */
    public function getEnableOnlinePublishing()
    {
        return $this->enableOnlinePublishing;
    }

    /**
     * Set enableBlog
     *
     * @param boolean $enableBlog
     * @return Series
     */
    public function setEnableBlog($enableBlog)
    {
        $this->enableBlog = $enableBlog;

        return $this;
    }

    /**
     * Get enableBlog
     *
     * @return boolean 
     */
    public function getEnableBlog()
    {
        return $this->enableBlog;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Series
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
     * @return Series
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
     * Set seriesStatus
     *
     * @param \Oktolab\DelorianBundle\Entity\SeriesStatus $seriesStatus
     * @return Series
     */
    public function setSeriesStatus(\Oktolab\DelorianBundle\Entity\SeriesStatus $seriesStatus = null)
    {
        $this->seriesStatus = $seriesStatus;

        return $this;
    }

    /**
     * Get seriesStatus
     *
     * @return \Oktolab\DelorianBundle\Entity\SeriesStatus 
     */
    public function getSeriesStatus()
    {
        return $this->seriesStatus;
    }

    /**
     * Set episodeNameSchema
     *
     * @param \Oktolab\DelorianBundle\Entity\EpisodeNameSchema $episodeNameSchema
     * @return Series
     */
    public function setEpisodeNameSchema(\Oktolab\DelorianBundle\Entity\EpisodeNameSchema $episodeNameSchema = null)
    {
        $this->episodeNameSchema = $episodeNameSchema;

        return $this;
    }

    /**
     * Get episodeNameSchema
     *
     * @return \Oktolab\DelorianBundle\Entity\EpisodeNameSchema 
     */
    public function getEpisodeNameSchema()
    {
        return $this->episodeNameSchema;
    }

    /**
     * Set contact
     *
     * @param \Oktolab\DelorianBundle\Entity\DatabaseContactCard $contact
     * @return Series
     */
    public function setContact(\Oktolab\DelorianBundle\Entity\DatabaseContactCard $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \Oktolab\DelorianBundle\Entity\DatabaseContactCard 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set tutor
     *
     * @param \Oktolab\DelorianBundle\Entity\DatabaseContactCard $tutor
     * @return Series
     */
    public function setTutor(\Oktolab\DelorianBundle\Entity\DatabaseContactCard $tutor = null)
    {
        $this->tutor = $tutor;

        return $this;
    }

    /**
     * Get tutor
     *
     * @return \Oktolab\DelorianBundle\Entity\DatabaseContactCard 
     */
    public function getTutor()
    {
        return $this->tutor;
    }

    /**
     * Set defaultLicenceType
     *
     * @param \Oktolab\DelorianBundle\Entity\LicenceType $defaultLicenceType
     * @return Series
     */
    public function setDefaultLicenceType(\Oktolab\DelorianBundle\Entity\LicenceType $defaultLicenceType = null)
    {
        $this->defaultLicenceType = $defaultLicenceType;

        return $this;
    }

    /**
     * Get defaultLicenceType
     *
     * @return \Oktolab\DelorianBundle\Entity\LicenceType 
     */
    public function getDefaultLicenceType()
    {
        return $this->defaultLicenceType;
    }

    /**
     * Add seriesCategory
     *
     * @param \Oktolab\DelorianBundle\Entity\SeriesCategory $seriesCategory
     * @return Series
     */
    public function addSeriesCategory(\Oktolab\DelorianBundle\Entity\SeriesCategory $seriesCategory)
    {
        $this->seriesCategory[] = $seriesCategory;

        return $this;
    }

    /**
     * Remove seriesCategory
     *
     * @param \Oktolab\DelorianBundle\Entity\SeriesCategory $seriesCategory
     */
    public function removeSeriesCategory(\Oktolab\DelorianBundle\Entity\SeriesCategory $seriesCategory)
    {
        $this->seriesCategory->removeElement($seriesCategory);
    }

    /**
     * Get seriesCategory
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeriesCategory()
    {
        return $this->seriesCategory;
    }

    /**
     * Add contentKeyword
     *
     * @param \Oktolab\DelorianBundle\Entity\ContentKeyword $contentKeyword
     * @return Series
     */
    public function addContentKeyword(\Oktolab\DelorianBundle\Entity\ContentKeyword $contentKeyword)
    {
        $this->contentKeyword[] = $contentKeyword;

        return $this;
    }

    /**
     * Remove contentKeyword
     *
     * @param \Oktolab\DelorianBundle\Entity\ContentKeyword $contentKeyword
     */
    public function removeContentKeyword(\Oktolab\DelorianBundle\Entity\ContentKeyword $contentKeyword)
    {
        $this->contentKeyword->removeElement($contentKeyword);
    }

    /**
     * Get contentKeyword
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContentKeyword()
    {
        return $this->contentKeyword;
    }

    /**
     * Add processKeyword
     *
     * @param \Oktolab\DelorianBundle\Entity\ProcessKeyword $processKeyword
     * @return Series
     */
    public function addProcessKeyword(\Oktolab\DelorianBundle\Entity\ProcessKeyword $processKeyword)
    {
        $this->processKeyword[] = $processKeyword;

        return $this;
    }

    /**
     * Remove processKeyword
     *
     * @param \Oktolab\DelorianBundle\Entity\ProcessKeyword $processKeyword
     */
    public function removeProcessKeyword(\Oktolab\DelorianBundle\Entity\ProcessKeyword $processKeyword)
    {
        $this->processKeyword->removeElement($processKeyword);
    }

    /**
     * Get processKeyword
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProcessKeyword()
    {
        return $this->processKeyword;
    }
}
