<?php

namespace Oktolab\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpFoundation\Response;

use Oktolab\MediaBundle\Entity\Series;
use Oktolab\MediaBundle\Entity\Episode;


/**
 * @Route("/api/oktolab_media")
 */
class MediaApiController extends Controller
{
    /**
     * @Route("/series.{format}", defaults={"format": "json"}, requirements={"format": "json|xml"})
     * @Security("has_role('ROLE_OKTOLAB_MEDIA_READ')")
     * Cache(expires="+1 hour", public="yes")
     * @Method("GET")
     */
    public function listSeriesAction($format)
    {
        $seriess = $this->getDoctrine()->getManager()->getRepository('OktolabMediaBundle:Series')->findAll();
        $jsonContent = $this->get('jms_serializer')->serialize($seriess, $format);
        return new Response($jsonContent, 200, array('Content-Type' => 'application/json; charset=utf-8'));
    }

    /**
     * @Route("/series/{uniqID}.{format}", defaults={"format": "json"}, requirements={"format": "json|xml"})
     * @Security("has_role('ROLE_OKTOLAB_MEDIA_READ')")
     * @Method("GET")
     */
    public function showSeriesAction(Series $series, $format)
    {
        $jsonContent = $this->get('jms_serializer')->serialize($series, $format);
        return new Response($jsonContent, 200, array('Content-Type' => 'application/json; charset=utf8'));
    }

    /**
     * @Route("/episode/{uniqID}.{format}", defaults={"format": "json"}, requirements={"format": "json|xml"})
     * @Security("has_role('ROLE_OKTOLAB_MEDIA_READ')")
     * @Method("GET")
     */
    public function showEpisodeAction(Episode $episode, $format)
    {
        $jsonContent = $this->get('jms_serializer')->serialize($episode, $format);
        return new Response($jsonContent, 200, array('Content-Type' => 'application/json; charset=utf8'));
    }

    /**
     * @Route("/import/series/{uniqID}.{format}", defaults={"format": "json"}, requirements={"format": "json|xml", "id": "\d+"})
     * @Security("has_role('ROLE_OKTOLAB_MEDIA_WRITE')")
     * @Method("POST")
     */
    public function importSeriesAction($uniqID)
    {
        //TODO: get usertoken, get url, use url + uniqid
        $apiuser = $this->get('security.context')->getToken()->getUser();
        return new Response("", Response::HTTP_ACCEPTED);
        //TODO:and send OktolabMediaBundle worker to import an entire series
    }

    /**
     * @Route("/import/episode/{uniqID}.{format}", defaults={"format": "json"}, requirements={"format": "json|xml", "id": "\d+"})
     * @Security("has_role('ROLE_OKTOLAB_MEDIA_WRITE')")
     * @Method("POST")
     */
    public function importEpisodeAction($uniqID)
    {
        //TODO: get usertoken, get url, use url + uniqid
        $apiuser = $this->get('security.context')->getToken()->getUser();
        return new Response("", Response::HTTP_ACCEPTED);
        //TODO:and send OktolabMediaBundle worker to import an episode
    }
}
