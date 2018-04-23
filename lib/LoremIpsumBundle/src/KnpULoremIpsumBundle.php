<?php
namespace KnpU\LoremIpsumBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use KnpU\LoremIpsumBundle\DependencyInjection\KnpULoremIpsumExtension;

class KnpULoremIpsumBundle extends Bundle {
  public function getContainerExtension(){
    if (null === $this->extension){
      $this->extension = new KnpULoremIpsumExtension();
    }
    
    return $this->extension;
  }
}
