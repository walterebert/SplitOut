<?php

namespace SplitOut\Application;

use SplitOut\Framework\Request;
use SplitOut\Framework\Response;

class AjaxWorkflow extends \SplitOut\Framework\Workflow {

   protected function doExecute(Request $request, Response $response) {
      $auth = new Authentication();
      $loginController = new LoginController($auth);
      $result = $loginController->execute($request, $response);

      if ($result) {
         $view = new \SplitOut\Application\SuccessView();
      } else {
         $view = new \SplitOut\Application\ErrorView();
      }
      return $view;
      
   }

}
