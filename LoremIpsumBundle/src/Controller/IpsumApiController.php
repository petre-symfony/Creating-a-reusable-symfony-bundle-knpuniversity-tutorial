<?php
namespace KnpU\LoremIpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use KnpU\LoremIpsumBundle\KnpUIpsum;
use KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class IpsumApiController extends AbstractController {
  private $knpUIpsum;
  private $eventDispatcher;
  
  public function __construct(KnpUIpsum $knpUIpsum, EventDispatcherInterface $eventDispatcher) {
    $this->knpUIpsum = $knpUIpsum;
    $this->eventDispatcher = $eventDispatcher;
  }


  public function index(){
    $data = [
      'paragraphs' => $this->knpUIpsum->getParagraphs(),
      'sentences' => $this->knpUIpsum->getSentences()
    ];
    
    $event = new FilterApiResponseEvent($data);
    $this->eventDispatcher->dispatch('knpu_forem_ipsum.filter_api',$event);
    
    return $this->json($event->getData());
  }  
}
