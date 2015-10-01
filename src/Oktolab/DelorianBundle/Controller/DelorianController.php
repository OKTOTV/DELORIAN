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
     * @Route("/{page}", defaults={"page": 0}, name="list_series", requirements={"page": "\d+"})
     * @Template()
     */
    public function listSeriesAction($page)
    {
        $total = $this->getDoctrine()->getManager('flow')->getRepository('OktolabDelorianBundle:Series')->findAll();

        if ($page < 0) {
            $page = 0;
        }
        if ($page*10 > $total) {
            $page = $total -10;
        }

        $old_seriess = $this->getDoctrine()->getManager('flow')->getRepository('OktolabDelorianBundle:Series')->findBy(array(), array(), 10, $page*10);

        $start_result = $page*10+1;
        if ($page == 0) {
            $start_result = 1;
        }
        $end_result = $start_result + 10;

        return array(
            'currentPage' => $page,
            'start_result' => $start_result,
            'end_result' => $end_result,
            'seriess' => $old_seriess,
            'total' => count($total));
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
