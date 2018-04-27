<?php
namespace KnpU\LoremIpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use KnpU\LoremIpsumBundle\KnpUIpsum;

class IpsumApiController extends AbstractController {
  private $knpUIpsum;
  
  public function __construct(KnpUIpsum $knpUIpsum) {
    $this->knpUIpsum = $knpUIpsum;
  }


  public function index(){
    return $this->json([
        'paragraphs' => $this->knpUIpsum->getParagraphs(),
        'sentences' => $this->knpUIpsum->getSentences()
    ]);
  }  
}
