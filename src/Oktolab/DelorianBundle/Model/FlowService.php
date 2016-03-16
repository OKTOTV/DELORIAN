<?php

namespace Oktolab\DelorianBundle\Model;

use Oktolab\DelorianBundle\Entity\Series as DelorianSeries;
use Oktolab\DelorianBundle\Entity\Episode as DelorianEpisode;

class FlowService {

    private $flow_em;

    public function __construct($flow_manager) {
        $this->flow_em = $flow_manager;
    }

    public function getSeries($id)
    {
        $series = $this->flow_em->getRepository('OktolabDelorianBundle:Series')->findOneBy(array('id' => $id));
        if ($series) {
            return $series;
        }
        return false;
    }

    public function getEpisode($id)
    {
        $episode = $this->flow_em->getRepository('OktolabDelorianBundle:Episode')->findOneBy(array('id' => $id));
        if ($episode) {
            return $episode;
        }

        return false;
    }

    public function getEpisodes($series_id)
    {
        return $this->flow_em->getRepository('OktolabDelorianBundle:Episode')->findBy(['series' => $series_id]);
    }

    public function getClips($episode_id)
    {
        return $this->flow_em->getRepository('OktolabDelorianBundle:EpisodeClip')->findBy(array('episode' => $episode_id));
    }

    public function getEpisodeClip($episode_id)
    {
        return $this->flow_em->getRepository('OktolabDelorianBundle:EpisodeClip')->findOneBy(array('episode' => $episode_id));
    }

    public function getAttachment($episode)
    {
        $attachmentObject = $this->flow_em->getRepository('OktolabDelorianBundle:AttachmentObject')->findOneBy(array('reference' => $episode->getUniqID()));
        if ($attachmentObject) {
            $attachment = $this->flow_em->getRepository('OktolabDelorianBundle:Attachment')->findOneBy(array('attachmentObject' => $attachmentObject->getId(), 'attachmentRole' => 3));
            if (!$attachment) { //not an episode posterframe, search the clip posteframe -.-
                $episodeclips = $this->flow_em->getRepository('OktolabDelorianBundle:EpisodeClip')->findBy(array('episode' => $episode->getUniqID()));
                if ($episodeclips) {
                    $attachmentObject = $this->flow_em->getRepository('OktolabDelorianBundle:AttachmentObject')->findOneBy(array('reference' => $episodeclips[0]->getClip()->getId()));
                    if ($attachmentObject) {
                        $attachment = $this->flow_em->getRepository('OktolabDelorianBundle:Attachment')->findOneBy(array('attachmentObject' => $attachmentObject->getId(), 'attachmentRole' => 4));
                    }
                }
            }
            if ($attachment) {
                return $attachment;
            }
        }
        return false;
    }

    public function getSeriesAttachment($series)
    {
        $attachmentObject = $this->flow_em->getRepository('OktolabDelorianBundle:AttachmentObject')->findOneBy(array('reference' => $series->getUniqID()));
        if ($attachmentObject) {
            $attachment = $this->flow_em->getRepository('OktolabDelorianBundle:Attachment')->findOneBy(array('attachmentObject' => $attachmentObject->getId(), 'attachmentRole' => 2));
            if ($attachment) {
                return $attachment;
            }
        }
        return false;
    }
}
