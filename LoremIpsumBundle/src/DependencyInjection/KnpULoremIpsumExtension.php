<?php
namespace KnpU\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;

class KnpULoremIpsumExtension extends Extension {
  public function load(array $configs, ContainerBuilder $container) {
    //var_dump($configs); die();
    $loader = new XmlFileLoader($container, new FileLocator(__DIR__. '/../Resources/config'));
    $loader->load('services.xml');
    
    $configuration = $this->getConfiguration($configs, $container);
    $config = $this->processConfiguration($configuration, $configs);  
    
    $definition = $container->getDefinition('knpu_lorem_ipsum-knpu_ipsum');
    
    $definition->setArgument(1, $config['unicorns_are_real']);
    $definition->setArgument(2, $config['min_sunshine']);
  }

  public function getAlias() {
    return 'knpu_lorem_ipsum';
  }
}
