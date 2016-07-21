<?php

namespace Okto\MediaBundle\Controller;

use Oktolab\MediaBundle\Controller\SeriesController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Okto\MediaBundle\Form\EpisodeType;
use Okto\MediaBundle\Form\SeriesImportProgressType;
use Okto\MediaBundle\Entity\Series;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/oktolab_media/series")
 */
class SeriesController extends BaseController
{
    /**
     * Lists all Series entities.
     *
     * @Route("/{page}", name="oktolab_series", defaults={"page" = 1}, requirements={"page": "\d+"})
     * @Template()
     */
    public function indexAction($page)
    {
        $series_class = $this->container->getParameter('oktolab_media.series_class');
        $query = $this->getDoctrine()->getManager()
            ->getRepository($series_class)->findSeries($series_class, true);
        $paginator  = $this->get('knp_paginator');
        $seriess = $paginator->paginate(
            $query,
            $page,
            5
        );

        return array('seriess' => $seriess);
    }

    /**
     * Finds and displays a Series entity.
     * @ParamConverter("series", class="MediaBundle:Series")
     * @Route("/show/{series}", name="oktolab_series_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($series)
    {
        return ['series' => $series];
    }

    /**
     * Finds and displays a Series entity.
     * @ParamConverter("series", class="MediaBundle:Series")
     * @Route("/{series/paginate/{series}/{page}", name="media_episode_paginator", requirements={"page": "\d+"}, defaults={"page":1})
     * @Method("GET")
     * @Template()
     */
    public function paginationEpisodesAction($series, $page)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT e FROM MediaBundle:Episode e WHERE e.series = :series";
        $query = $em->createQuery($dql);
        $query->setParameter('series', $series->getId());

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $page/*page number*/,
            8
        );
        $pagination->setUsedRoute('media_episode_paginator', ['series' => $series]);
        $pagination->setParam('series', $series->getId());

        return ['pagination' => $pagination];
    }

    /**
     * @Route("/{series}/update_progress", name="oktolab_media_update_series_progress")
     * @Method({"POST", "GET"})
     * @Template()
     */
    public function updateProgressAction(Request $request, Series $series)
    {
        $trans = $this->get('translator');
        $form = $this->createForm(new SeriesImportProgressType($trans), $series);
        $form->add('submit', SubmitType::class, ['label' => 'oktolab_media.update_progress_button', 'attr' => ['class' => 'btn btn-primary']]);

        if ($request->getMethod() == "POST") { //sends form
            $form->handleRequest($request);
            if ($form->isValid()) { //form is valid, save or preview
                $em = $this->getDoctrine()->getManager();
                $em->persist($series);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success', 'oktolab_media.success_updated_series_import_state');
                return $this->redirect($this->generateUrl('oktolab_series_show', ['series' => $series->getId()]));
            }
            $this->get('session')->getFlashBag()->add('error', 'oktothek.error_edit_episode');
        }

        return ['form' => $form->createView(), 'series' => $series];
    }
}
