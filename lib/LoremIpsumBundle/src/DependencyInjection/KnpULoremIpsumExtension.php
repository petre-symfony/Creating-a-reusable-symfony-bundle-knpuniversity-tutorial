<?php
namespace KnpU\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

class KnpULoremIpsumExtension extends Extension {
  public function load(array $configs, ContainerBuilder $container) {
    //var_dump($configs); die();
    $loader = new XmlFileLoader($container, new FileLocator(__DIR__. '/../Resources/config'));
    $loader->load('services.xml');
    
    $configuration = $this->getConfiguration($configs, $container);
    $config = $this->processConfiguration($configuration, $configs);
    var_dump($config); die();   
  }

  public function getAlias() {
    return 'knpu_lorem_ipsum';
  }
}
