<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Bprs\AssetBundle\Entity\Asset as BaseAsset;

/**
 * Asset
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bprs\AssetBundle\Entity\AssetRepository")
 */
class Asset extends BaseAsset
{
}
