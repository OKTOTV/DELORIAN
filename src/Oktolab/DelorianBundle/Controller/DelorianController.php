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
