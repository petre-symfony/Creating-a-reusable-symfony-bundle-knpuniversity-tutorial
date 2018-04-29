<?php
namespace KnpU\LoremIpsumBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use KnpU\LoremIpsumBundle\DependencyInjection\KnpULoremIpsumExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use KnpU\LoremIpsumBundle\DependencyInjection\Compiler\WordProviderCompilerPass;

class KnpULoremIpsumBundle extends Bundle {
  public function build(ContainerBuilder $container){
    $container->addCompilerPass(new WordProviderCompilerPass());
  }
  public function getContainerExtension(){
    if (null === $this->extension){
      $this->extension = new KnpULoremIpsumExtension();
    }
    
    return $this->extension;
  }
}
