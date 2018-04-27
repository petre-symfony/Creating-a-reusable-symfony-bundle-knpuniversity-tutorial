<?php
namespace KnpU\LoremIpsumBundle\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Kernel;
use KnpU\LoremIpsumBundle\KnpULoremIpsumBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Loader\LoaderInterface;

class IpsumApiControllerTest extends TestCase {
  public function testIndex(){
    
  }
}

class KnpULoremIpsumControllerKernel extends Kernel {
  
  public function __construct() {
    parent::__construct('test', true);
  }

  public function registerBundles(){
    return [
      new KnpULoremIpsumBundle()
    ];
  } 

  public function registerContainerConfiguration(LoaderInterface $loader) {
    $loader->load(function(ContainerBuilder $container){
      
    });
  } 

  public function getCacheDir(){
    return __DIR__.'/cache/'.spl_object_hash($this);
  }

}
