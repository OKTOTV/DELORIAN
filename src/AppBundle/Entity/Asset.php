<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Bprs\AssetBundle\Entity\Asset as BaseAsset;

/**
 * Asset
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bprs\AssetBundle\Entity\AssetRepository")
 * @JMS\AccessType("public_method")
 * @JMS\ExclusionPolicy("all")
 */
class Asset extends BaseAsset
{
}
