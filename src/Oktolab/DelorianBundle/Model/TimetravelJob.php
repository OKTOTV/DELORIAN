<?php
namespace Oktolab\DelorianBundle\Model;

use Bprs\CommandLineBundle\Model\BprsContainerAwareJob;

class TimetravelJob extends BprsContainerAwareJob
{
    public function perform() {
        $timetravelService = $this->getContainer()->get('delorian.timetravel');
        $logbook = $this->getContainer()->get('bprs_logbook');

        switch ($this->args['type']) {
            case 'episode':
                $logbook->info('delorian.start_episode_timetravel', [], $this->args['id']);
                $timetravelService->timetravelEpisode($this->args['id']);
                $logbook->info('delorian.end_episode_timetravel', [], $this->args['id']);
                break;

            case 'series':
                $logbook->info('delorian.start_series_timetravel', [], $this->args['id']);
                $timetravelService->timetravelSeries($this->args['id']);
                $logbook->info('delorian.end_series_timetravel', [], $this->args['id']);
                break;
            default:
                echo "???";
                # code...
                break;
        }
    }

    public function getName()
    {
        return 'Timetravel Job';
    }
}
?>
