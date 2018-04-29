<?php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use KnpU\LoremIpsumBundle\Event\KnpULoremIpsumEvents;
use KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent;

class AddMessageToIpsumApiSubscriber implements EventSubscriberInterface {
  public static function getSubscribedEvents(): array {
    return [
      KnpULoremIpsumEvents::FILTER_API => 'onFilterApi'
    ];
  }
  
  public function onFilterApi(FilterApiResponseEvent $event){
    $data = $event->getData();
    $data['message'] = 'Have a magical day';
    $event->setData($data);
  }

}
