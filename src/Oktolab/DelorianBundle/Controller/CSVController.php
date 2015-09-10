<?php

namespace Oktolab\DelorianBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Oktolab\DelorianBundle\Entity\Series as DelorianSeries;

class CSVController extends Controller
{
    /**
     * @Route("/{page}", defaults={"page": 0}, name="csv_series")
     * @Template()
     */
    public function indexAction($page)
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
     * @Route("/firstruns/{id}", defaults={"page": 0}, name="csv_firstruns")
     * @Template()
     */
    public function firstRunsAction(Request $request, DelorianSeries $old_series)
    {
        $defaultData = array('message' => 'Get all firstRans from to');
            $form = $this->createFormBuilder($defaultData)
                ->add('from', 'date')
                ->add('to', 'date')
                ->add('send', 'submit')
                ->getForm();

        if ($request->getMethod() == "POST") { //form sent
            $form->handleRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();
                $query = $this->getDoctrine()->getManager()->createQuery('SELECT u FROM OktolabDelorianBundle:Episode u WHERE u.firstRanAt > :from AND u.firstRanAt < :to AND u.series = :series ORDER BY u.firstRanAt ASC');
                $query->setParameter('from', $data['from']);
                $query->setParameter('to', $data['to']);
                $query->setParameter('series', $old_series);
                $old_episodes = $query->getResult();

                //die(var_dump($old_episodes));
                return $this->CSVResponse($old_episodes);
            } else {
                $this->get('session')->getFlashBag()->add('error', "ERROR");
            }
        }
        return array('form' => $form->createView(), 'series' => $old_series);
    }

    public function CSVResponse($old_episodes) {
        // while (false !== ($row = $items->next())) {
            // add a line in the csv file. You need to implement a toArray() method
            // to transform your object into an array
        $response = new StreamedResponse(function() use($old_episodes) {
            $handle = fopen('php://output', 'r+');
                fputcsv($handle,
                    array(
                        'Bezeichnung',
                        'Titel',
                        'Erstausstrahlung',
                        'Abstrakt',
                        'Kommentar'
                    )
                );

            foreach ($old_episodes as $old_episode) {
                fputcsv($handle,
                    array(
                        $old_episode->getSeries()->getAbbrevation().' '.$old_episode->getSeasonNumber().'x'.$old_episode->getEpisodeNumber(),
                        $old_episode->getTitle(),
                        $old_episode->getFirstRanAt()->format('d.m.Y'),
                        $old_episode->getAbstractTextPublic(),
                        $old_episode->getComments()
                    )
                );
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'application/force-download');
        $response->headers->set('Content-Disposition','attachment; filename="export.csv"');

        return $response;
    }
}
