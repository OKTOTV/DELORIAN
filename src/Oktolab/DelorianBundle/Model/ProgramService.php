<?php

namespace Oktolab\DelorianBundle\Model;

use GuzzleHttp\Client;

class ProgramService {

    public function parseProgram(\Datetime $start, \Datetime $end)
    {
        $program = array();
        $client = new Client();
        $response = $client->request('GET', $this->getProgrammweekURLforDate($start));
        if ($response->getStatusCode() == 200) {
            $xml = new \SimpleXMLElement($response->getBody());
            foreach($xml->show as $xml_show) {
                // die(var_dump(new \Datetime((string)$xml_show['airdate']) < $start));
                if (new \Datetime((string)$xml_show['airdate']) < $start || new \Datetime((string)$xml_show['airdate']) > $end ) {
                    continue;
                }
                $show = array();
                $show['airdate'] = (string)$xml_show['airdate'];
                $show['uniqID'] = (string)$xml_show['clip_id'];
                $show['name'] = (string)$xml_show['title'];
                $show['description'] = (string)$xml_show['content'] == "" ? (string)$xml_show['series_promotext'] : (string)$xml_show['content'];
                $show['series_name'] = (string)$xml_show['sendungsname'];
                $show['repetitions'] = array();
                foreach($xml_show->repetitions->repetition as $xml_repetition) {
                    $show['repetitions'][] = (string)$xml_repetition['airtime'];
                }
                $program[] = $show;
            }
        }
        return $program;
    }

    private function getProgrammweekURLforDate(\Datetime $current)
    {
        $start = clone $current;
        $date = $start->modify(sprintf('-%s days', $start->format('N')-1));
        //die(var_dump(sprintf('http://api.okto.tv/program_weeks/website_week_%s.xml', $date->format('Y-m-d'))));
        return sprintf('http://api.okto.tv/program_weeks/website_week_%s.xml', $date->format('Y-m-d'));
    }
}
