<?php
namespace KnpU\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface{
  
  public function getConfigTreeBuilder(): \Symfony\Component\Config\Definition\Builder\TreeBuilder {
    $treeBuilder = new TreeBuilder();
    $rootNode = $treeBuilder->root('knpu_lorem_ipsum');
    
    $rootNode
      ->children()
        ->booleanNode('unicorns_are_real')->defaultTrue()->end()
        ->integerNode('min_sunshine')->defaultValue(3)->end()
      ->end();
    
    
    return $treeBuilder;
  }

}
