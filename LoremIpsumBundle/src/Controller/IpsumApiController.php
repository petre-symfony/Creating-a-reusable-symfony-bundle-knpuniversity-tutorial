<?php
namespace KnpU\LoremIpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use KnpU\LoremIpsumBundle\KnpUIpsum;
use KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent;

class IpsumApiController extends AbstractController {
  private $knpUIpsum;
  
  public function __construct(KnpUIpsum $knpUIpsum) {
    $this->knpUIpsum = $knpUIpsum;
  }


  public function index(){
    $data = [
      'paragraphs' => $this->knpUIpsum->getParagraphs(),
      'sentences' => $this->knpUIpsum->getSentences()
    ];
    
    $event = new FilterApiResponseEvent($data);
    
    return $this->json($event->getData());
  }  
}
