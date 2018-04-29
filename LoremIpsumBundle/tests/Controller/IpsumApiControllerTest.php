<?php
namespace KnpU\LoremIpsumBundle\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Kernel;
use KnpU\LoremIpsumBundle\KnpULoremIpsumBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Loader\LoaderInterface;
use \Symfony\Component\Routing\RouteCollectionBuilder;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;

class IpsumApiControllerTest extends TestCase {
  public function testIndex(){
    $kernel = new KnpULoremIpsumControllerKernel();
    $client = new Client($kernel);
    $client->request('GET', '/api/');
    
    $this->assertSame(200, $client->getResponse()->getStatusCode());
  }
}

class KnpULoremIpsumControllerKernel extends Kernel {
  use MicroKernelTrait;
  public function __construct() {
    parent::__construct('test', true);
  }

  public function registerBundles(){
    return [
      new KnpULoremIpsumBundle(),
      new FrameworkBundle(),  
    ];
  } 

  public function configureContainer(ContainerBuilder $c, LoaderInterface $l){
    $c->loadFromExtension('framework', [
        'secret' => 'F00'
    ]);
  }
  
  public function configureRoutes(RouteCollectionBuilder $routes){
    $routes->import(__DIR__.'/../../src/Resources/config/routes.xml', '/api');
  }

  public function getCacheDir(){
    return __DIR__.'/../cache/'.spl_object_hash($this);
  }

}
