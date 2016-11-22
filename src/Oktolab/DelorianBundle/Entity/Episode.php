<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Episode
 *
 * @ORM\Table(name="episode", indexes={@ORM\Index(name="episode_FI_1", columns={"series_id"})})
 * @ORM\Entity(repositoryClass="Oktolab\DelorianBundle\Entity\EpisodeRepository")
 */
class Episode
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
     * @ORM\Column(name="season_number", type="string", length=2, nullable=false)
     */
    private $seasonNumber = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="episode_number", type="integer", nullable=true)
     */
    private $episodeNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="version_title", type="string", length=255, nullable=true)
     */
    private $versionTitle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="override_title", type="boolean", nullable=true)
     */
    private $overrideTitle = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="override_abstract", type="boolean", nullable=true)
     */
    private $overrideAbstract = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="first_ran_at", type="datetime", nullable=true)
     */
    private $firstRanAt;

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
     * @var integer
     *
     * @ORM\Column(name="planned_length", type="integer", nullable=true)
     */
    private $plannedLength = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="decimal", precision=11, scale=5, nullable=true)
     */
    private $length = '0.00000';

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
     * @var string
     *
     * @ORM\Column(name="stored_data", type="text", nullable=true)
     */
    private $storedData;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="online_start_date", type="datetime", nullable=true)
     */
    private $onlineStartDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable_online_publishing", type="boolean", nullable=false)
     */
    private $enableOnlinePublishing = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable_clip_startdate_publishing", type="boolean", nullable=false)
     */
    private $enableClipStartdatePublishing = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_tv_tipp", type="boolean", nullable=false)
     */
    private $isTvTipp = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_web_encoded", type="boolean", nullable=false)
     */
    private $isWebEncoded = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="max_broadcasts", type="integer", nullable=true)
     */
    private $maxBroadcasts;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="min_airdate", type="datetime", nullable=true)
     */
    private $minAirdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="max_airdate", type="datetime", nullable=true)
     */
    private $maxAirdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="online_end_date", type="datetime", nullable=true)
     */
    private $onlineEndDate;

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
     * @var \Series
     *
     * @ORM\ManyToOne(targetEntity="Series")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="series_id", referencedColumnName="id")
     * })
     */
    private $series;

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
     * Set seasonNumber
     *
     * @param string $seasonNumber
     * @return Episode
     */
    public function setSeasonNumber($seasonNumber)
    {
        $this->seasonNumber = $seasonNumber;

        return $this;
    }

    /**
     * Get seasonNumber
     *
     * @return string
     */
    public function getSeasonNumber()
    {
        return $this->seasonNumber;
    }

    /**
     * Set episodeNumber
     *
     * @param integer $episodeNumber
     * @return Episode
     */
    public function setEpisodeNumber($episodeNumber)
    {
        $this->episodeNumber = $episodeNumber;

        return $this;
    }

    /**
     * Get episodeNumber
     *
     * @return integer
     */
    public function getEpisodeNumber()
    {
        return $this->episodeNumber;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Episode
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
     * Set versionTitle
     *
     * @param string $versionTitle
     * @return Episode
     */
    public function setVersionTitle($versionTitle)
    {
        $this->versionTitle = $versionTitle;

        return $this;
    }

    /**
     * Get versionTitle
     *
     * @return string
     */
    public function getVersionTitle()
    {
        return $this->versionTitle;
    }

    /**
     * Set overrideTitle
     *
     * @param boolean $overrideTitle
     * @return Episode
     */
    public function setOverrideTitle($overrideTitle)
    {
        $this->overrideTitle = $overrideTitle;

        return $this;
    }

    /**
     * Get overrideTitle
     *
     * @return boolean
     */
    public function getOverrideTitle()
    {
        return $this->overrideTitle;
    }

    /**
     * Set overrideAbstract
     *
     * @param boolean $overrideAbstract
     * @return Episode
     */
    public function setOverrideAbstract($overrideAbstract)
    {
        $this->overrideAbstract = $overrideAbstract;

        return $this;
    }

    /**
     * Get overrideAbstract
     *
     * @return boolean
     */
    public function getOverrideAbstract()
    {
        return $this->overrideAbstract;
    }

    /**
     * Set firstRanAt
     *
     * @param \DateTime $firstRanAt
     * @return Episode
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
     * Set abstractText
     *
     * @param string $abstractText
     * @return Episode
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
     * @return Episode
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
     * @return Episode
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
     * @return Episode
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
     * Set archiveAbstractText
     *
     * @param string $archiveAbstractText
     * @return Episode
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
     * @return Episode
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
     * @return Episode
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
     * Set plannedLength
     *
     * @param integer $plannedLength
     * @return Episode
     */
    public function setPlannedLength($plannedLength)
    {
        $this->plannedLength = $plannedLength;

        return $this;
    }

    /**
     * Get plannedLength
     *
     * @return integer
     */
    public function getPlannedLength()
    {
        return $this->plannedLength;
    }

    /**
     * Set length
     *
     * @param string $length
     * @return Episode
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set evaluationScoreContent
     *
     * @param float $evaluationScoreContent
     * @return Episode
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
     * @return Episode
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
     * @return Episode
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
     * Set storedData
     *
     * @param string $storedData
     * @return Episode
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
     * Set onlineStartDate
     *
     * @param \DateTime $onlineStartDate
     * @return Episode
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
     * Set enableOnlinePublishing
     *
     * @param boolean $enableOnlinePublishing
     * @return Episode
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
     * Set enableClipStartdatePublishing
     *
     * @param boolean $enableClipStartdatePublishing
     * @return Episode
     */
    public function setEnableClipStartdatePublishing($enableClipStartdatePublishing)
    {
        $this->enableClipStartdatePublishing = $enableClipStartdatePublishing;

        return $this;
    }

    /**
     * Get enableClipStartdatePublishing
     *
     * @return boolean
     */
    public function getEnableClipStartdatePublishing()
    {
        return $this->enableClipStartdatePublishing;
    }

    /**
     * Set isTvTipp
     *
     * @param boolean $isTvTipp
     * @return Episode
     */
    public function setIsTvTipp($isTvTipp)
    {
        $this->isTvTipp = $isTvTipp;

        return $this;
    }

    /**
     * Get isTvTipp
     *
     * @return boolean
     */
    public function getIsTvTipp()
    {
        return $this->isTvTipp;
    }

    /**
     * Set isWebEncoded
     *
     * @param boolean $isWebEncoded
     * @return Episode
     */
    public function setIsWebEncoded($isWebEncoded)
    {
        $this->isWebEncoded = $isWebEncoded;

        return $this;
    }

    /**
     * Get isWebEncoded
     *
     * @return boolean
     */
    public function getIsWebEncoded()
    {
        return $this->isWebEncoded;
    }

    /**
     * Set maxBroadcasts
     *
     * @param integer $maxBroadcasts
     * @return Episode
     */
    public function setMaxBroadcasts($maxBroadcasts)
    {
        $this->maxBroadcasts = $maxBroadcasts;

        return $this;
    }

    /**
     * Get maxBroadcasts
     *
     * @return integer
     */
    public function getMaxBroadcasts()
    {
        return $this->maxBroadcasts;
    }

    /**
     * Set minAirdate
     *
     * @param \DateTime $minAirdate
     * @return Episode
     */
    public function setMinAirdate($minAirdate)
    {
        $this->minAirdate = $minAirdate;

        return $this;
    }

    /**
     * Get minAirdate
     *
     * @return \DateTime
     */
    public function getMinAirdate()
    {
        return $this->minAirdate;
    }

    /**
     * Set maxAirdate
     *
     * @param \DateTime $maxAirdate
     * @return Episode
     */
    public function setMaxAirdate($maxAirdate)
    {
        $this->maxAirdate = $maxAirdate;

        return $this;
    }

    /**
     * Get maxAirdate
     *
     * @return \DateTime
     */
    public function getMaxAirdate()
    {
        return $this->maxAirdate;
    }

    /**
     * Set onlineEndDate
     *
     * @param \DateTime $onlineEndDate
     * @return Episode
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Episode
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
     * @return Episode
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
     * Set series
     *
     * @param \Oktolab\DelorianBundle\Entity\Series $series
     * @return Episode
     */
    public function setSeries(\Oktolab\DelorianBundle\Entity\Series $series = null)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return \Oktolab\DelorianBundle\Entity\Series
     */
    public function getSeries()
    {
        return $this->series;
    }
}
