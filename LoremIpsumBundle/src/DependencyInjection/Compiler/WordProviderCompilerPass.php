<?php
namespace KnpU\LoremIpsumBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class WordProviderCompilerPass implements CompilerPassInterface {
  
  public function process(ContainerBuilder $container) {
    foreach($container->findTaggedServiceIds('knpu_ipsum_word_provider') as $id => $tags){
      var_dump($id);
    }
    die;
  }

}
