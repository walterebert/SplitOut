<?php

namespace SplitOut\Application;

use SplitOut\Framework\Request;
use SplitOut\Framework\Response;

class PageWorkflow extends \SplitOut\Framework\Workflow {

   protected function doExecute(Request $request, Response $response) {
      return new StaticPageView('home.html');
   }
}
