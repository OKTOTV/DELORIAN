<?php
namespace Oktolab\DelorianBundle\Model;

use Bprs\CommandLineBundle\Model\BprsContainerAwareJob;

class TimetravelJob extends BprsContainerAwareJob
{
    public function perform() {
        echo "Activate Fluxcapacitor\n";
        $timetravelService = $this->getContainer()->get('delorian.timetravel');

        switch ($this->args['type']) {
            case 'episode':
                $timetravelService->timetravelEpisode($this->args['id']);
                break;

            case 'series':
                $timetravelService->timetravelSeries($this->args['id']);
                break;
            default:
                echo "???";
                # code...
                break;
        }
    }
}
?>
