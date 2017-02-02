<?php

namespace Oktolab\DelorianBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Oktolab\DelorianBundle\Entity\Series as DelorianSeries;

/**
* @Route("/delorian")
*/
class CSVController extends Controller
{
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
                ->add('delimiter', 'text')
                ->add('send', 'submit')
                ->getForm();

        if ($request->getMethod() == "POST") { //form sent
            $form->handleRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();
                $query = $this->getDoctrine()->getManager('flow')->createQuery('SELECT u FROM OktolabDelorianBundle:Episode u WHERE u.firstRanAt > :from AND u.firstRanAt < :to AND u.series = :series ORDER BY u.firstRanAt ASC');
                $query->setParameter('from', $data['from']);
                $query->setParameter('to', $data['to']);
                $query->setParameter('series', $old_series);
                $old_episodes = $query->getResult();

                return $this->CSVResponse($old_episodes, $old_series->getAbbrevation().' '.$data['from']->format('d.m.Y').'-'.$data['to']->format('d.m.Y').'.csv', $data['delimiter']);
            } else {
                $this->get('session')->getFlashBag()->add('error', "ERROR");
            }
        }
        return array('form' => $form->createView(), 'series' => $old_series);
    }

    /**
     * @Route("/firstRunsTotal/{from}/{to}")
     * @Template()
     */
    public function firstRunsTotalAction(Request $request, $from, $to)
    {
        $from = new \Datetime($from);
        $to = new \Datetime($to);
        $query = $this->getDoctrine()->getManager('flow')
            ->createQuery(
                'SELECT e FROM OktolabDelorianBundle:Episode e
                WHERE e.firstRanAt >= :from
                AND e.firstRanAt <= :to
                ORDER BY e.series ASC'
            );
        $query->setParameter('from', $from);
        $query->setParameter('to', $to);
        $old_episodes = $query->getResult();

        return $this->CSVResponse($old_episodes);
    }

    /**
     * @Route("/runsTotal/{from}/{to}")
     */
    public function runsTotalAction(Request $request, $from, $to)
    {
        $from = new \Datetime($from);
        $to = new \Datetime($to);
        $query = $this->getDoctrine()->getManager('flow')
            ->createQuery(
                'SELECT bei FROM OktolabDelorianBundle:BroadcastEpisodeItem bei
                LEFT JOIN bei.episode e
                LEFT JOIN bei.broadcastItem be
                WHERE be.airtime >= :from
                AND be.airtime <= :to
                GROUP BY e.series
                ORDER BY be.airtime ASC'
            );
        $query->setParameter('from', $from);
        $query->setParameter('to', $to);

        $broadcastEpisodeItems = $query->getResult();
        $delimiter = ';';
        $response = new StreamedResponse(function() use($broadcastEpisodeItems, $delimiter) {
            $handle = fopen('php://output', 'r+');
                fputcsv($handle,
                    array(
                        'Sendereihe',
                        'Bezeichnung',
                        'Titel',
                        'Ausstrahlung',
                        'Erstausstrahlungsdatum',
                        'Erstausstrahlungszeit',
                        'Länge',
                        'Abstrakt',
                        'Kommentar',
                        'Stunden',
                        'Minuten',
                        'Sekunden'
                    ),
                    $delimiter
                );

            foreach ($broadcastEpisodeItems as $bei) {
                $old_episode = $bei->getEpisode();
                $length = 0;
                if ($old_episode) {
                    $length = $old_episode->getLength();
                    if (!$length) {
                        $length = 0;
                    }
                }
                $hours = floor($length / 3600);
                $mins = floor(($length - ($hours*3600)) / 60);
                $secs = floor($length % 60);
                fputcsv($handle,
                    array(
                        $old_episode ? $old_episode->getSeries()->getTitle() : 'N/A',
                        $old_episode ? $old_episode->getSeries()->getAbbrevation().' '.$old_episode->getSeasonNumber().'x'.$old_episode->getEpisodeNumber() : 'N/A',
                        $old_episode ? $old_episode->getTitle() : 'N/A',
                        $bei->getBroadcastItem() ? $bei->getBroadcastItem()->getAirtime()->format('H:i d.m.Y') : 'N/A',
                        $old_episode ? $old_episode->getFirstRanAt()->format('d.m.Y') : 'N/A',
                        $old_episode ? $old_episode->getFirstRanAt()->format('H:i') : 'N/A',
                        $old_episode ? $hours.':'.$mins.':'.$secs : 'N/A',
                        $old_episode ? $old_episode->getAbstractTextPublic() : 'N/A',
                        $old_episode ? $old_episode->getComments() : 'N/A',
                        $hours,
                        $mins,
                        $secs
                    ),
                    $delimiter
                );
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'application/force-download');
        $response->headers->set('Content-Disposition','attachment; filename="export.csv"');

        return $response;
    }

    public function CSVResponse($old_episodes, $filename = 'export.csv', $delimiter = ';') {
        $response = new StreamedResponse(function() use($old_episodes, $delimiter) {
            $handle = fopen('php://output', 'r+');
                fputcsv($handle,
                    array(
                        'Sendereihe',
                        'Bezeichnung',
                        'Titel',
                        'Erstausstrahlungsdatum',
                        'Erstausstrahlungszeit',
                        'Länge',
                        'Abstrakt',
                        'Kommentar',
                        'Stunden',
                        'Minuten',
                        'Sekunden'
                    ),
                    $delimiter
                );

            foreach ($old_episodes as $old_episode) {
                $length = $old_episode->getLength();
                if (!$length) {
                    $length = 0;
                }
                $hours = floor($length / 3600);
                $mins = floor(($length - ($hours*3600)) / 60);
                $secs = floor($length % 60);
                fputcsv($handle,
                    array(
                        $old_episode->getSeries()->getTitle(),
                        $old_episode->getSeries()->getAbbrevation().' '.$old_episode->getSeasonNumber().'x'.$old_episode->getEpisodeNumber(),
                        $old_episode->getTitle(),
                        $old_episode->getFirstRanAt()->format('d.m.Y'),
                        $old_episode->getFirstRanAt()->format('H:i'),
                        $hours.':'.$mins.':'.$secs,
                        $old_episode->getAbstractTextPublic(),
                        $old_episode->getComments(),
                        $hours,
                        $mins,
                        $secs
                    ),
                    $delimiter
                );
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'application/force-download');
        $response->headers->set('Content-Disposition','attachment; filename="'.$filename.'"');

        return $response;
    }

    /**
     * @Route("/hitlist", name="csv_hitlist")
     * @Template()
     */
    public function uploadHitlistCSVAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('csv', 'file')
            ->add('send', 'submit')
            ->getForm();

        if ($request->getMethod() == "POST") { // posts CSV
            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();
                $hitlist = $this->get('delorian.csvhandler')->generateHitlist($data['csv']);

                return $this->downloadHitlist($hitlist);
                return $this->render('OktolabDelorianBundle::CSV/results.html.twig', array('hitlist'=> $hitlist));
            }
            $this->get('session')->getFlashBag()->add('error', 'CSV Anhängen, schwachkopf!');
        }
        return ['form' => $form->createView()];
    }

    private function downloadHitlist($hitlist)
    {

        $response = new StreamedResponse(function() use($hitlist) {
            $handle = fopen('php://output', 'r+');
                fputcsv($handle,
                    array(
                        'Datum',
                        'Durchschnittsreichweite (Tsd)',
                        'Marktanteil (%)',
                        'Episode',
                        'Programmtool VON',
                        'Programmtool BIS'
                    )
                );

            foreach ($hitlist as $hit) {
                $date = $hit['datum']->format('H:i d.m.Y');
                $title = $hit['episode'] ? $hit['episode']->getTitle() : 'NOT FOUND';
                fputcsv($handle,
                    array(
                        $date,
                        $hit['DRW'],
                        $hit['MA'],
                        $title,
                        $hit['episode'] ? $hit['episode']->getAirtime()->format('H:i d.m.Y') : 'NOT FOUND',
                        $hit['episode'] ? $hit['episode']->getEndAirtime()->format('H:i d.m.Y') : 'NOT FOUND'
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
