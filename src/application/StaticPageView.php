<?php

namespace SplitOut\Application;

use SplitOut\Framework\View;
use splitOut\Framework\Response;

class StaticPageView extends View {

   protected $filename;
   
   public function __construct($filename) {
      $this->filename = $filename;
   }

   public function render(Response $response) {
      return file_get_contents(__DIR__ . '/../../templates/'.$this->filename);
   }

}
