<?php

namespace AppBundle\Twig;

/**
 * returns an episode or series by id (or null if none found)
 */
class PTHelper extends \Twig_Extension {

    private $pt_em;

    public function __construct($pt_em)
    {
        $this->pt_em = $pt_em;
    }

    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('pt_episode', [$this,'getEpisode']),
            new \Twig_SimpleFunction('pt_series', [$this,'getSeries'])
        );
    }

    public function getEpisode($id)
    {
        return $this->pt_em->getRepository('OktolabDelorianBundle:Episode')->findOneBy(['id' => $id]);
    }

    public function getSeries($id)
    {
        return $this->pt_em->getRepository('OktolabDelorianBundle:Series')->findOneBy(['id' => $id]);
    }

    public function getName() {
        return 'delorian_pt_extension';
    }

}


 ?>
