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
* @Route("/delorian")
*/
class DelorianController extends Controller
{
    /**
     * @Route("/series", name="series")
     * @Template()
     */
    public function listSeriesAction()
    {
        $em = $this->getDoctrine()->getManager('delorian');
        // TODO: service! pagination!
        $series = $em->getRepository('OktolabMediaBundle:Series')->findAll();
        return array('seriess' => $series);
    }

    /**
     * @Route("/series/{series}", name="show_series", requirements={"series": "\d+"})
     * @Template()
     */
    public function showSeriesAction($series)
    {
        $em = $this->getDoctrine()->getManager('delorian');
        $series = $em->getRepository('OktolabMediaBundle:Series')->findOneBy(array('id' => $series));
        return array('series' => $series);
    }

    /**
     * @Route("/episode/{episode}", name="show_episode", requirements={"episode": "\d+"})
     * @Template()
     */
    public function showEpisodeAction($episode)
    {
        $em = $this->getDoctrine()->getManager('delorian');
        $episode = $em->getRepository('OktolabMediaBundle:Episode')->findOneBy(array('id' => $episode));
        return array('episode' => $episode);
    }

    /**
     * @Route("/timetravelseries", name="timetravelseries")
     * @Template()
     */
     public function timetravelSeriesAction(DelorianSeries $old_series)
     {

     }

     /**
      * @Route("/timetravelseries", name="timetravelepisode")
      * @Template()
      */
     public function timetravelEpisodeAction(DelorianEpisode $old_episode)
     {

     }
}
