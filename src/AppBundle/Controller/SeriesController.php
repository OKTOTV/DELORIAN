<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Series;
use AppBundle\Form\SeriesImportProgressType;

class SeriesController extends Controller {

    /**
     * @Route("/{series}/update_progress", name="delorian_update_series_progress")
     * @Method({"POST", "GET"})
     * @Template()
     */
    public function updateProgressAction(Request $request, Series $series)
    {
        $trans = $this->get('translator');
        $form = $this->createForm(new SeriesImportProgressType($trans), $series);
        $form->add('submit', SubmitType::class, ['label' => 'delorian.update_progress_button', 'attr' => ['class' => 'btn btn-primary']]);

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

 ?>
