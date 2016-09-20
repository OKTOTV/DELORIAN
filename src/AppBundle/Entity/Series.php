<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Okto\MediaBundle\Entity\Series as OktoSeries;

/**
 * @ORM\Entity(repositoryClass="Oktolab\MediaBundle\Entity\Repository\BaseSeriesRepository")
 */
class Series extends OktoSeries {

}

 ?>
