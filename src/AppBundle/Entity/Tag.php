<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Okto\MediaBundle\Entity\Tag as OktoTag;

/**
 * @ORM\Entity(repositoryClass="Okto\MediaBundle\Entity\Repository\TagRepository")
 */
class Tag extends OktoTag {

}

 ?>
