<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Oktolab\DelorianBundle\OktolabDelorianBundle(),
            new Bprs\StyleBundle\BprsStyleBundle(),
            new Oktolab\MediaBundle\OktolabMediaBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Bprs\AppLinkBundle\BprsAppLinkBundle(),
            new Bprs\AssetBundle\BprsAssetBundle(),
            new Oneup\UploaderBundle\OneupUploaderBundle(),
            new Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),
            new Bprs\CommandLineBundle\BprsCommandLineBundle(),
            //new Okto\MediaBundle\MediaBundle(),
            new Okto\MediaBundle\OktoMediaBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new AppBundle\AppBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Bprs\UserBundle\BprsUserBundle(),
            new Oneup\FlysystemBundle\OneupFlysystemBundle(),
            new Bprs\LogbookBundle\BprsLogbookBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
