<?php

namespace SplitOut\Application;

use SplitOut\Framework\View;
use splitOut\Framework\Response;

class SuccessView extends View {

   public function render(Response $response) {
      return '<p class="success">'.htmlentities($response->getData('username')).'</p>';
   }

}
