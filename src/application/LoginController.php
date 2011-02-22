<?php

namespace SplitOut\Application;

use SplitOut\Framework\Controller;
use SplitOut\Framework\Request;
use SplitOut\Framework\Response;

class LoginController extends Controller {

   public function execute(Request $request, Response $response) {
      $auth = new \SplitOut\Application\Authentication();
      if ($auth->isValid($request->getPost('username'), $request->getPost('passwd'))) {
         $response->addData('display','Welcome home!');
         $response->addData('loginSuccess', true);
         return;
      }
      $response->addData('display','Please check your credentials');
      $response->addData('loginSuccess', false);
   }
}
