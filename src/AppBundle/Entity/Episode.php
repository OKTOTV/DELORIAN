<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Okto\MediaBundle\Entity\Episode as OktoEpisode;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity(repositoryClass="Okto\MediaBundle\Entity\Repository\EpisodeRepository")
 * @JMS\AccessType("public_method")
 * @JMS\ExclusionPolicy("all")
 */
class Episode extends OktoEpisode {

}
