<?php

namespace SplitOut\Application;

use SplitOut\Framework\Controller;
use SplitOut\Framework\Request;

class LoginController extends Controller {

   public function execute(Request $request) {
      $auth = new \SplitOut\Application\Authentication();
      if ($auth->isValid($request->getPost('username'), $request->getPost('passwd'))) {
         var_dump('Success!');
      }
   }
}
