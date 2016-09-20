<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Okto\MediaBundle\Entity\Series as OktoSeries;

/**
 * @ORM\Entity(repositoryClass="Oktolab\MediaBundle\Entity\Repository\BaseSeriesRepository")
 */
class Series extends OktoSeries {

    const IMPORT_PROGRESS_FRESH = 0;
    const IMPORT_PROGRESS_IN_WORK = 10;
    const IMPORT_PROGRESS_FINISHED = 20;

    /**
     * @ORM\Column(type="integer", options={"default"="0"})
     */
    private $importProgress;

    public function __construct()
    {
        parent::__construct();
        $this->importProgress = 0;
    }

    public function setImportProgress($value)
    {
        $this->importProgress = $value;
        return $this;
    }

    public function getImportProgress()
    {
        return $this->importProgress;
    }
}

 ?>
