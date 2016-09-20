<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Okto\MediaBundle\Entity\Episode as OktoEpisode;

/**
 * @ORM\Entity(repositoryClass="Oktolab\MediaBundle\Entity\Repository\BaseEpisodeRepository")
 */
class Episode extends OktoEpisode {

}

 ?>
