<?php

namespace Oktolab\DelorianBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Oktolab\DelorianBundle\Entity\Series as DelorianSeries;
use Oktolab\DelorianBundle\Entity\Episode as DelorianEpisode;
use Oktolab\MediaBundle\Entity\Series;
use Oktolab\MediaBundle\Entity\Episode;

/**
 * @Route("delorian/public_api")
 */
class DelorianApiController extends Controller
{
    /**
    * @Route("/program/{start}/{end}.{format}", defaults={"format": "json"}, requirements={"format": "json|xml"})
    * @ParamConverter("start", options={"format": "Y-m-d\TH:i"})
    * @ParamConverter("end", options={"format": "Y-m-d\TH:i"})
    */
    public function showProgram(\Datetime $start, \Datetime $end, $format)
    {
        $program = $this->get('delorian.program')->parseProgram($start, $end);
        $content = $this->get('jms_serializer')->serialize($program, $format);
        return new Response($content, 200, array('Content-Type' => 'application/json; charset=utf8'));
    }
}
