<?php
namespace KnpU\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class KnpULoremIpsumExtension extends Extension {
  //put your code here
  public function load(array $configs, ContainerBuilder $container) {
    var_dumo('We\'re alive');die;
  }

}
