<?php

namespace Okto\MediaBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OverrideServiceCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('oktolab_media.routing_loader');
        $definition->setClass('Okto\MediaBundle\Routing\AdvancedLoader');
    }
}
