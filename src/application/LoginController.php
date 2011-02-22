<?php

namespace SplitOut\Application;

use SplitOut\Model\User;
use SplitOut\Framework\Controller;
use SplitOut\Framework\Request;

class LoginController extends Controller {

   public function execute(Request $request) {
      $finder = new \SplitOut\Application\Finder();
      $user = $finder->findUserByUsername($request->getPost('username'));
      if ($user->getPassword() == Helper::hashPassword($request->getPost('passwd'))) {
         var_dump('Success!');
         var_dump($user->getPassword());
      }
   }
}
