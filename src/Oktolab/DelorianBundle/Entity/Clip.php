<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clip
 *
 * @ORM\Table(name="clip", indexes={@ORM\Index(name="clip_I_1", columns={"online_start_date"}), @ORM\Index(name="clip_I_2", columns={"first_ran_at"}), @ORM\Index(name="clip_I_3", columns={"evaluation_score"}), @ORM\Index(name="clip_I_4", columns={"can_be_aired"}), @ORM\Index(name="clip_I_5", columns={"can_be_repeated"}), @ORM\Index(name="clip_I_6", columns={"production_date"}), @ORM\Index(name="clip_I_7", columns={"production_country"}), @ORM\Index(name="clip_FI_1", columns={"video_id"}), @ORM\Index(name="clip_FI_2", columns={"licence_type_id"})})
 * @ORM\Entity
 */
class Clip
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
     * @var \DateTime
     *
     * @ORM\Column(name="online_start_date", type="datetime", nullable=true)
     */
    private $onlineStartDate;

    /**
     * @var string
     *
     * @ORM\Column(name="online_timecode_in", type="decimal", precision=11, scale=5, nullable=true)
     */
    private $onlineTimecodeIn = '0.00000';

    /**
     * @var string
     *
     * @ORM\Column(name="online_timecode_out", type="decimal", precision=11, scale=5, nullable=true)
     */
    private $onlineTimecodeOut = '0.00000';

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable_online_publishing", type="boolean", nullable=false)
     */
    private $enableOnlinePublishing = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="xrated", type="boolean", nullable=false)
     */
    private $xrated = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable_startdate_publishing", type="boolean", nullable=false)
     */
    private $enableStartdatePublishing = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="default_aspect_ratio", type="decimal", precision=3, scale=2, nullable=true)
     */
    private $defaultAspectRatio = '1.33';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="online_end_date", type="datetime", nullable=true)
     */
    private $onlineEndDate;

    /**
     * @var string
     *
     * @ORM\Column(name="timecode_in", type="decimal", precision=11, scale=5, nullable=false)
     */
    private $timecodeIn;

    /**
     * @var string
     *
     * @ORM\Column(name="timecode_out", type="decimal", precision=11, scale=5, nullable=false)
     */
    private $timecodeOut;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract_text", type="text", nullable=true)
     */
    private $abstractText;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract_text_public", type="text", nullable=true)
     */
    private $abstractTextPublic;

    /**
     * @var string
     *
     * @ORM\Column(name="archive_abstract_text", type="text", nullable=true)
     */
    private $archiveAbstractText;

    /**
     * @var string
     *
     * @ORM\Column(name="archive_abstract_text_public", type="text", nullable=true)
     */
    private $archiveAbstractTextPublic;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="first_ran_at", type="datetime", nullable=true)
     */
    private $firstRanAt;

    /**
     * @var float
     *
     * @ORM\Column(name="evaluation_score_content", type="float", precision=10, scale=0, nullable=true)
     */
    private $evaluationScoreContent;

    /**
     * @var float
     *
     * @ORM\Column(name="evaluation_score_technical", type="float", precision=10, scale=0, nullable=true)
     */
    private $evaluationScoreTechnical;

    /**
     * @var float
     *
     * @ORM\Column(name="evaluation_score", type="float", precision=10, scale=0, nullable=true)
     */
    private $evaluationScore;

    /**
     * @var integer
     *
     * @ORM\Column(name="can_be_aired", type="integer", nullable=true)
     */
    private $canBeAired;

    /**
     * @var integer
     *
     * @ORM\Column(name="can_be_repeated", type="integer", nullable=true)
     */
    private $canBeRepeated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="production_date", type="datetime", nullable=true)
     */
    private $productionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="production_country", type="string", length=255, nullable=true)
     */
    private $productionCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="stored_data", type="text", nullable=true)
     */
    private $storedData;

    /**
     * @var string
     *
     * @ORM\Column(name="tags_public", type="text", nullable=true)
     */
    private $tagsPublic;

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
     * @var \Video
     *
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     * })
     */
    private $video;

    /**
     * @var \LicenceType
     *
     * @ORM\ManyToOne(targetEntity="LicenceType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="licence_type_id", referencedColumnName="id")
     * })
     */
    private $licenceType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ContentKeyword", inversedBy="clip")
     * @ORM\JoinTable(name="clip_content_keyword",
     *   joinColumns={
     *     @ORM\JoinColumn(name="clip_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="ProcessKeyword", inversedBy="clip")
     * @ORM\JoinTable(name="clip_process_keyword",
     *   joinColumns={
     *     @ORM\JoinColumn(name="clip_id", referencedColumnName="id")
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
     * Set onlineStartDate
     *
     * @param \DateTime $onlineStartDate
     * @return Clip
     */
    public function setOnlineStartDate($onlineStartDate)
    {
        $this->onlineStartDate = $onlineStartDate;

        return $this;
    }

    /**
     * Get onlineStartDate
     *
     * @return \DateTime 
     */
    public function getOnlineStartDate()
    {
        return $this->onlineStartDate;
    }

    /**
     * Set onlineTimecodeIn
     *
     * @param string $onlineTimecodeIn
     * @return Clip
     */
    public function setOnlineTimecodeIn($onlineTimecodeIn)
    {
        $this->onlineTimecodeIn = $onlineTimecodeIn;

        return $this;
    }

    /**
     * Get onlineTimecodeIn
     *
     * @return string 
     */
    public function getOnlineTimecodeIn()
    {
        return $this->onlineTimecodeIn;
    }

    /**
     * Set onlineTimecodeOut
     *
     * @param string $onlineTimecodeOut
     * @return Clip
     */
    public function setOnlineTimecodeOut($onlineTimecodeOut)
    {
        $this->onlineTimecodeOut = $onlineTimecodeOut;

        return $this;
    }

    /**
     * Get onlineTimecodeOut
     *
     * @return string 
     */
    public function getOnlineTimecodeOut()
    {
        return $this->onlineTimecodeOut;
    }

    /**
     * Set enableOnlinePublishing
     *
     * @param boolean $enableOnlinePublishing
     * @return Clip
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
     * Set xrated
     *
     * @param boolean $xrated
     * @return Clip
     */
    public function setXrated($xrated)
    {
        $this->xrated = $xrated;

        return $this;
    }

    /**
     * Get xrated
     *
     * @return boolean 
     */
    public function getXrated()
    {
        return $this->xrated;
    }

    /**
     * Set enableStartdatePublishing
     *
     * @param boolean $enableStartdatePublishing
     * @return Clip
     */
    public function setEnableStartdatePublishing($enableStartdatePublishing)
    {
        $this->enableStartdatePublishing = $enableStartdatePublishing;

        return $this;
    }

    /**
     * Get enableStartdatePublishing
     *
     * @return boolean 
     */
    public function getEnableStartdatePublishing()
    {
        return $this->enableStartdatePublishing;
    }

    /**
     * Set defaultAspectRatio
     *
     * @param string $defaultAspectRatio
     * @return Clip
     */
    public function setDefaultAspectRatio($defaultAspectRatio)
    {
        $this->defaultAspectRatio = $defaultAspectRatio;

        return $this;
    }

    /**
     * Get defaultAspectRatio
     *
     * @return string 
     */
    public function getDefaultAspectRatio()
    {
        return $this->defaultAspectRatio;
    }

    /**
     * Set onlineEndDate
     *
     * @param \DateTime $onlineEndDate
     * @return Clip
     */
    public function setOnlineEndDate($onlineEndDate)
    {
        $this->onlineEndDate = $onlineEndDate;

        return $this;
    }

    /**
     * Get onlineEndDate
     *
     * @return \DateTime 
     */
    public function getOnlineEndDate()
    {
        return $this->onlineEndDate;
    }

    /**
     * Set timecodeIn
     *
     * @param string $timecodeIn
     * @return Clip
     */
    public function setTimecodeIn($timecodeIn)
    {
        $this->timecodeIn = $timecodeIn;

        return $this;
    }

    /**
     * Get timecodeIn
     *
     * @return string 
     */
    public function getTimecodeIn()
    {
        return $this->timecodeIn;
    }

    /**
     * Set timecodeOut
     *
     * @param string $timecodeOut
     * @return Clip
     */
    public function setTimecodeOut($timecodeOut)
    {
        $this->timecodeOut = $timecodeOut;

        return $this;
    }

    /**
     * Get timecodeOut
     *
     * @return string 
     */
    public function getTimecodeOut()
    {
        return $this->timecodeOut;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Clip
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
     * Set abstractText
     *
     * @param string $abstractText
     * @return Clip
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
     * @return Clip
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
     * Set archiveAbstractText
     *
     * @param string $archiveAbstractText
     * @return Clip
     */
    public function setArchiveAbstractText($archiveAbstractText)
    {
        $this->archiveAbstractText = $archiveAbstractText;

        return $this;
    }

    /**
     * Get archiveAbstractText
     *
     * @return string 
     */
    public function getArchiveAbstractText()
    {
        return $this->archiveAbstractText;
    }

    /**
     * Set archiveAbstractTextPublic
     *
     * @param string $archiveAbstractTextPublic
     * @return Clip
     */
    public function setArchiveAbstractTextPublic($archiveAbstractTextPublic)
    {
        $this->archiveAbstractTextPublic = $archiveAbstractTextPublic;

        return $this;
    }

    /**
     * Get archiveAbstractTextPublic
     *
     * @return string 
     */
    public function getArchiveAbstractTextPublic()
    {
        return $this->archiveAbstractTextPublic;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Clip
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
     * Set firstRanAt
     *
     * @param \DateTime $firstRanAt
     * @return Clip
     */
    public function setFirstRanAt($firstRanAt)
    {
        $this->firstRanAt = $firstRanAt;

        return $this;
    }

    /**
     * Get firstRanAt
     *
     * @return \DateTime 
     */
    public function getFirstRanAt()
    {
        return $this->firstRanAt;
    }

    /**
     * Set evaluationScoreContent
     *
     * @param float $evaluationScoreContent
     * @return Clip
     */
    public function setEvaluationScoreContent($evaluationScoreContent)
    {
        $this->evaluationScoreContent = $evaluationScoreContent;

        return $this;
    }

    /**
     * Get evaluationScoreContent
     *
     * @return float 
     */
    public function getEvaluationScoreContent()
    {
        return $this->evaluationScoreContent;
    }

    /**
     * Set evaluationScoreTechnical
     *
     * @param float $evaluationScoreTechnical
     * @return Clip
     */
    public function setEvaluationScoreTechnical($evaluationScoreTechnical)
    {
        $this->evaluationScoreTechnical = $evaluationScoreTechnical;

        return $this;
    }

    /**
     * Get evaluationScoreTechnical
     *
     * @return float 
     */
    public function getEvaluationScoreTechnical()
    {
        return $this->evaluationScoreTechnical;
    }

    /**
     * Set evaluationScore
     *
     * @param float $evaluationScore
     * @return Clip
     */
    public function setEvaluationScore($evaluationScore)
    {
        $this->evaluationScore = $evaluationScore;

        return $this;
    }

    /**
     * Get evaluationScore
     *
     * @return float 
     */
    public function getEvaluationScore()
    {
        return $this->evaluationScore;
    }

    /**
     * Set canBeAired
     *
     * @param integer $canBeAired
     * @return Clip
     */
    public function setCanBeAired($canBeAired)
    {
        $this->canBeAired = $canBeAired;

        return $this;
    }

    /**
     * Get canBeAired
     *
     * @return integer 
     */
    public function getCanBeAired()
    {
        return $this->canBeAired;
    }

    /**
     * Set canBeRepeated
     *
     * @param integer $canBeRepeated
     * @return Clip
     */
    public function setCanBeRepeated($canBeRepeated)
    {
        $this->canBeRepeated = $canBeRepeated;

        return $this;
    }

    /**
     * Get canBeRepeated
     *
     * @return integer 
     */
    public function getCanBeRepeated()
    {
        return $this->canBeRepeated;
    }

    /**
     * Set productionDate
     *
     * @param \DateTime $productionDate
     * @return Clip
     */
    public function setProductionDate($productionDate)
    {
        $this->productionDate = $productionDate;

        return $this;
    }

    /**
     * Get productionDate
     *
     * @return \DateTime 
     */
    public function getProductionDate()
    {
        return $this->productionDate;
    }

    /**
     * Set productionCountry
     *
     * @param string $productionCountry
     * @return Clip
     */
    public function setProductionCountry($productionCountry)
    {
        $this->productionCountry = $productionCountry;

        return $this;
    }

    /**
     * Get productionCountry
     *
     * @return string 
     */
    public function getProductionCountry()
    {
        return $this->productionCountry;
    }

    /**
     * Set storedData
     *
     * @param string $storedData
     * @return Clip
     */
    public function setStoredData($storedData)
    {
        $this->storedData = $storedData;

        return $this;
    }

    /**
     * Get storedData
     *
     * @return string 
     */
    public function getStoredData()
    {
        return $this->storedData;
    }

    /**
     * Set tagsPublic
     *
     * @param string $tagsPublic
     * @return Clip
     */
    public function setTagsPublic($tagsPublic)
    {
        $this->tagsPublic = $tagsPublic;

        return $this;
    }

    /**
     * Get tagsPublic
     *
     * @return string 
     */
    public function getTagsPublic()
    {
        return $this->tagsPublic;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Clip
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
     * @return Clip
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
     * Set video
     *
     * @param \Oktolab\DelorianBundle\Entity\Video $video
     * @return Clip
     */
    public function setVideo(\Oktolab\DelorianBundle\Entity\Video $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \Oktolab\DelorianBundle\Entity\Video 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set licenceType
     *
     * @param \Oktolab\DelorianBundle\Entity\LicenceType $licenceType
     * @return Clip
     */
    public function setLicenceType(\Oktolab\DelorianBundle\Entity\LicenceType $licenceType = null)
    {
        $this->licenceType = $licenceType;

        return $this;
    }

    /**
     * Get licenceType
     *
     * @return \Oktolab\DelorianBundle\Entity\LicenceType 
     */
    public function getLicenceType()
    {
        return $this->licenceType;
    }

    /**
     * Add contentKeyword
     *
     * @param \Oktolab\DelorianBundle\Entity\ContentKeyword $contentKeyword
     * @return Clip
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
     * @return Clip
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
