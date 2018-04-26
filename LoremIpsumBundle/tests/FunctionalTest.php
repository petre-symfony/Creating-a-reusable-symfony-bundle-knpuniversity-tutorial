<?php

namespace KnpU\LoremIpsumBundle\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\Config\Loader\LoaderInterface;
use KnpU\LoremIpsumBundle\KnpULoremIpsumBundle;
use KnpU\LoremIpsumBundle\KnpUIpsum;
use KnpU\LoremIpsumBundle\WordProviderInterface;

class FunctionalTest extends TestCase{
  public function testServiceWiring(){
    $kernel = new KnpULoremIpsumTestingKernel();
    $kernel->boot();
    $container = $kernel->getContainer();
    
    $ipsum = $container->get('knpu_lorem_ipsum-knpu_ipsum');
    $this->assertInstanceOf(KnpUIpsum::class, $ipsum);
    $this->assertInternalType('string', $ipsum->getParagraphs());
  }
  
  public function testServiceWiringWithConfiguration(){
    $kernel = new KnpULoremIpsumTestingKernel();
    $kernel->boot();
    $container = $kernel->getContainer();
    
    $ipsum = $container->get('knpu_lorem_ipsum-knpu_ipsum');
    
  }
}

class KnpULoremIpsumTestingKernel extends Kernel {
  private $knpUIpsumConfig;
public function __construct(array $knpUIpsumConfig = []) {
  $this->knpUIpsumConfig = $knpUIpsumConfig;
  
  parent::__construct('test', true);
}

public function registerBundles(){
  return [
    new KnpULoremIpsumBundle()
  ];
} 

public function registerContainerConfiguration(LoaderInterface $loader) {

}

}

class stubWordList implements WordProviderInterface{
  
  public function getWordList(): array {
    return ['stub', 'stub2'];
  }

}
