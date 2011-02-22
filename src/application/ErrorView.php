<?php

namespace SplitOut\Application;

use SplitOut\Framework\View;
use splitOut\Framework\Response;

class ErrorView extends View {

   public function render(Response $response) {
      return '<p class="error">Please check <b>your</b> credentials!</p>';
   }

}
