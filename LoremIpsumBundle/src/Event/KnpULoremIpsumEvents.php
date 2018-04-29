<?php
namespace KnpU\LoremIpsumBundle\Event;


final class KnpULoremIpsumEvents {
  /**
   * Called directly before the Lorem Ipsum API is returned
   * 
   * Listeners have the opportunity to change that data
   * 
   * @Event("KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent")
   */
  const FILTER_API = 'knpu_forem_ipsum.filter_api';
}
