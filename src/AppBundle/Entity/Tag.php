<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Okto\MediaBundle\Entity\Tag as OktoTag;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity(repositoryClass="Okto\MediaBundle\Entity\Repository\TagRepository")
 * @JMS\AccessType("public_method")
 * @JMS\ExclusionPolicy("all")
 */
class Tag extends OktoTag {

}
