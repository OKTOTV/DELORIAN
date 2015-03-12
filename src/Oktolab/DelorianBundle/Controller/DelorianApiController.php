<?php

namespace Oktolab\DelorianBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Oktolab\DelorianBundle\Entity\Series as DelorianSeries;
use Oktolab\DelorianBundle\Entity\Episode as DelorianEpisode;
use Oktolab\MediaBundle\Entity\Series;
use Oktolab\MediaBundle\Entity\Episode;

/**
 * @Route("delorian/api")
 */
class DelorianApiController extends Controller
{
    /**
     * @Route("/series.{format}", defaults={"format": "json"}, requirements={"format": "json|xml"})
     * @Method("GET")
     */
    public function listSeriesAction($format)
    {
        $old_seriess = $this->getDoctrine()->getManager()->getRepository('OktolabDelorianBundle:Series')->findAll();
        $seriess = array();
        foreach ($old_sereiss as $old_series) {
            $series = new Series();
            $series->setName($old_series->getTitle());
            $series->setDescription($old_series->getAbstractTextPublic());
            $series->setCreatedAt($old_series->getCreatedAt());
            $series->setUpdatedAt($old_series->getUpdatedAt());
            $series->setUniqID($old_series->getId());
            $seriess[] = $series;
        }

        $jsonContent = $this->get('jms_serializer')->serialize($seriess, $format);
        return new Response($jsonContent, 200, array('Content-Type' => 'application/json; charset=utf8'));
    }

    /**
     * @Route("/series/{id}.{format}", defaults={"format": "json"}, requirements={"format": "json|xml"})
     * @Method("GET")
     */
    public function showSeriesAction(DelorianSeries $old_series, $format)
    {
        $series = new Series();
        $series->setName($old_series->getTitle());
        $series->setDescription($old_series->getAbstractTextPublic());
        $series->setCreatedAt($old_series->getCreatedAt());
        $series->setUpdatedAt($old_series->getUpdatedAt());
        $series->setUniqID($old_series->getId());

        $jsonContent = $this->get('jms_serializer')->serialize($series, $format);
        return new Response($jsonContent, 200, array('Content-Type' => 'application/json; charset=utf8'));
    }

    /**
     * @Route("/series/{id}/episodes.{format}", defaults={"format": "json"}, requirements={"format": "json|xml"})
     * @Method("GET")
     */
    public function showSeriesEpisodesAction(DelorianSeries $old_series, $format)
    {
        $old_episodes = $this->getDoctrine()->getManager()->getRepository('OktolabDelorianBundle:Episode')->findBy(array('series' => $old_series->getId()));
        $episodes = array();
        foreach ($old_episodes as $old_episode) {
            $episode = new Episode();
            $episode->setName($old_episode->getTitle());
            $episode->setDescription($old_episode->getAbstractTextPublic());
            $episode->setCreatedAt($old_episode->getCreatedAt());
            $episode->setUpdatedAt($old_episode->getUpdatedAt());
            $episode->setUniqID($old_episode->getId());
            $episodes[] = $episode;
        }

        $jsonContent = $this->get('jms_serializer')->serialize($episodes, $format);
        return new Response($jsonContent, 200, array('Content-Type' => 'application/json; charset=utf8'));
    }

    /**
     * @Route("/episode/{id}.{format}", defaults={"format": "json"}, requirements={"format": "json|xml"})
     * @Method("GET")
     */
    public function showEpisodeAction(DelorianEpisode $old_episode, $format)
    {
        $episode = new Episode();
        $episode->setName($old_episode->getTitle());
        $episode->setDescription($old_episode->getAbstractTextPublic());
        $episode->setCreatedAt($old_episode->getCreatedAt());
        $episode->setUpdatedAt($old_episode->getUpdatedAt());
        $episode->setUniqID($old_episode->getId());
        
        $jsonContent = $this->get('jms_serializer')->serialize($episode, $format);
        return new Response($jsonContent, 200, array('Content-Type' => 'application/json; charset=utf8'));
    }
}
