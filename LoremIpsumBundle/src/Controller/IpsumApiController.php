<?php
namespace KnpU\LoremIpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use KnpU\LoremIpsumBundle\KnpUIpsum;
use KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use KnpU\LoremIpsumBundle\Event\KnpULoremIpsumEvents;

class IpsumApiController extends AbstractController {
  private $knpUIpsum;
  private $eventDispatcher;
  
  public function __construct(KnpUIpsum $knpUIpsum, EventDispatcherInterface $eventDispatcher = null) {
    $this->knpUIpsum = $knpUIpsum;
    $this->eventDispatcher = $eventDispatcher;
  }


  public function index(){
    $data = [
      'paragraphs' => $this->knpUIpsum->getParagraphs(),
      'sentences' => $this->knpUIpsum->getSentences()
    ];
    
    $event = new FilterApiResponseEvent($data);
    if ($this->eventDispatcher){
      $this->eventDispatcher->dispatch(KnpULoremIpsumEvents::FILTER_API, $event);
    }
    
    return $this->json($event->getData());
  }  
}
