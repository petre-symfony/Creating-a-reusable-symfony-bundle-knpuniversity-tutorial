<?php

namespace KnpU\LoremIpsumBundle\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\Config\Loader\LoaderInterface;
use KnpU\LoremIpsumBundle\KnpULoremIpsumBundle;
use KnpU\LoremIpsumBundle\KnpUIpsum;

class FunctionalTest extends TestCase{
  public function testServiceWiring(){
    $kernel = new KnpULoremIpsumTestingKernel('test', true);
    $kernel->boot();
    $container = $kernel->getContainer();
    
    $ipsum = $container->get('knpu_lorem_ipsum-knpu_ipsum');
    $this->assertInstanceOf(KnpUIpsum::class, $ipsum);
    $this->assertInternalType('string', $ipsum->getParagraphs());
  }
}

class KnpULoremIpsumTestingKernel extends Kernel {
  
public function registerBundles(){
  return [
    new KnpULoremIpsumBundle()
  ];
} 

public function registerContainerConfiguration(LoaderInterface $loader) {

}

}
