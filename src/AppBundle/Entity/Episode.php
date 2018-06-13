<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Okto\MediaBundle\Entity\Episode as OktoEpisode;

/**
 * @ORM\Entity(repositoryClass="Okto\MediaBundle\Entity\Repository\EpisodeRepository")
 */
class Episode extends OktoEpisode {

}
