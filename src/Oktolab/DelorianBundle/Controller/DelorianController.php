<?php

namespace Oktolab\DelorianBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Oktolab\DelorianBundle\Entity\Series as DelorianSeries;
use Oktolab\DelorianBundle\Entity\Episode as DelorianEpisode;

/**
* handles local import from remote ressources. You may want to secure this controller.
* @Route("/delorian")
*/
class DelorianController extends Controller
{
    /**
     * @Route("/{page}", defaults={"page": 1}, name="list_series", requirements={"page": "\d+"})
     * @Template()
     */
    public function listSeriesAction($page)
    {
        $em = $this->getDoctrine()->getManager('flow');
        $dql = "SELECT s FROM OktolabDelorianBundle:Series s";
        $query = $em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $old_seriess = $paginator->paginate(
            $query,
            $page/*page number*/,
            10
        );
        return array('seriess' => $old_seriess, 'paginator' => $paginator);
    }

    /**
     * @Route("/series/{id}", name="show_series", requirements={"id": "\d+"})
     * @Template()
     */
    public function showSeriesAction($id)
    {
        $em = $this->getDoctrine()->getManager('flow');
        $series = $em->getRepository('OktolabDelorianBundle:Series')->findOneBy(array('id' => $id));
        $episodes = $em->getRepository('OktolabDelorianBundle:Episode')->findBy(array('series' => $id), array('firstRanAt' => 'DESC'));
        return array('series' => $series, 'episodes' => $episodes);
    }

    /**
     * @Route("/timetravelseries", name="timetravelseries")
     */
    public function timetravelSeriesAction(Request $request)
    {
        $id = $request->request->get('id');
        if ($id) {
            $this->get('delorian.timetravel')->fluxCompensateSeries($id);
            return new Response("", Response::HTTP_OK);
        }
        return new Response("", Response::HTTP_BAD_REQUEST);
    }

    /**
    * @Route("/timetravelepisode", name="timetravelepisode")
    */
    public function timetravelEpisodeAction(Request $request)
    {
        $id = $request->request->get('id');
        if ($id) {
            $this->get('delorian.timetravel')->fluxCompensateEpisode($id);
            return new Response("", Response::HTTP_OK);
        }
        return new Response("", Response::HTTP_BAD_REQUEST);
    }
}
