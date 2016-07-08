<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Oktolab\DelorianBundle\Entity\Series as DelorianSeries;
use Oktolab\DelorianBundle\Entity\Episode as DelorianEpisode;

/**
* handles local import from remote ressources. You may want to secure this controller.
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
            20
        );
        return array('seriess' => $old_seriess);
    }

    /**
     * @Route("/series/{id}/{page}", name="show_series", requirements={"id": "\d+", "page": "\d+"}, defaults={"page" = 1})
     * @Template()
     */
    public function showSeriesAction($id, $page)
    {
        $em = $this->getDoctrine()->getManager('flow');
        $series = $em->getRepository('OktolabDelorianBundle:Series')->findOneBy(array('id' => $id));
        $dql = "SELECT e FROM OktolabDelorianBundle:Episode e WHERE e.series = :series_id";
        $query = $em->createQuery($dql);
        $query->setParameter('series_id', $series->getId());
        $paginator  = $this->get('knp_paginator');
        $episodes = $paginator->paginate(
            $query,
            $page/*page number*/,
            20
        );
        return array('series' => $series, 'episodes' => $episodes);
    }

    /**
     * @Route("/timetravelseries", name="timetravelseries")
     */
    public function timetravelSeriesEpisodesAction(Request $request)
    {
        $id = $request->request->get('id');
        if ($id) {
            // @TODO: check if series exists and show warning
            if ($this->get('oktolab_media')->getSeries($id)) {
                if ($request->request->get('overwrite')) { // overwrite series
                    $this->get('delorian.timetravel')->fluxCompensateSeriesEpisodes($id);
                    return new Response("", Response::HTTP_OK);
                }
                return new JsonResponse(['already_exists' => 1]);
            }
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
            // @TODO: check if episode exists and show warning
            $this->get('delorian.timetravel')->fluxCompensateEpisode($id);
            return new Response("", Response::HTTP_OK);
        }
        return new Response("", Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Route("/timetravel", name="timetravel")
     */
    public function timetravelAction(Request $request)
    {
        $id = $request->request->get('id');
        $type = $request->request->get('type');
        $overwrite = $request->request->get('overwrite');
        switch ($type) {
            case 'episode':
                if ($this->get('oktolab_media')->getEpisode($id)) {
                    if ($request->request->get('overwrite')) { // overwrite series
                        $this->get('delorian.timetravel')->fluxCompensateEpisode($id);
                        return new Response("", Response::HTTP_OK);
                    }
                    return new JsonResponse(['already_exists' => 1]);
                }
                $this->get('delorian.timetravel')->fluxCompensateEpisode($id);
                return new Response("", Response::HTTP_OK);
                break;
            case 'series':
                if ($this->get('oktolab_media')->getSeries($id)) {
                    if ($request->request->get('overwrite')) { // overwrite series
                        $this->get('delorian.timetravel')->fluxCompensateSeriesEpisodes($id);
                        return new Response("", Response::HTTP_OK);
                    }
                    return new JsonResponse(['already_exists' => 1]);
                }
                $this->get('delorian.timetravel')->fluxCompensateSeriesEpisodes($id);
                return new Response("", Response::HTTP_OK);
                break;
            default:
                return new Response("", Response::HTTP_BAD_REQUEST);
                break;
        }
    }
}
