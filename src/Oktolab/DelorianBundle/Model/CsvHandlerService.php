<?php

namespace Oktolab\DelorianBundle\Model;

class CsvHandlerService {

    private $flow_em;

    public function __construct($entity_manager)
    {
        $this->flow_em = $entity_manager;
    }

    public function generateHitlist(\SplFileInfo $file)
    {
        $hitlist = [];
        $handle = fopen($file->getRealPath(), 'r');
        $headers = array();
        $headers['Datum'] = 0;
        $headers['Zeitabschnitt'] = 1;
        $headers['DRW Tsd'] = 2;
        $headers['MA %'] = 3;
        while (($data = fgetcsv($handle, 0, ";")) !== false) {
            if (in_array('Datum', $data)) {
                continue;
            }
            $entry = [];
            $date = $data[$headers['Datum']]; // example: 10/31/10
            $starttime = substr($data[$headers['Zeitabschnitt']], 0, 8); // example: 22:45:00-22:59:59
            $startdate = new \DateTime($date.' '.$starttime);
            $broadcastitem = $this->findBroadcastItem($startdate);
            $entry['datum'] = $startdate;
            if (!$broadcastitem) {
                $entry['episode'] = false;
            } else {
                $entry['episode'] = $broadcastitem;
            }

            $entry['DRW'] = $data[$headers['DRW Tsd']];
            $entry['MA'] = $data[$headers['MA %']];
            $hitlist[] = $entry;
        }
        fclose($handle);

        return $hitlist;
    }

    /**
     * Recursive search for matching Episode.
     */
    private function findBroadcastItem($startdate)
    {
        $query = $this->flow_em->createQuery('SELECT b FROM OktolabDelorianBundle:BroadcastItem b WHERE (b.airtime <= :startdate AND b.endAirtime >= :enddate)');
        $query->setParameters(array(
            'startdate' => $startdate,
            'enddate' => $startdate
        ));
        $results =  $query->getResult(); // array of objects
        if (!$results) {
            return false;
        }
        return $results[0];
    }
}
