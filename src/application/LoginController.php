<?php

namespace SplitOut\Application;

use SplitOut\Framework\Controller;
use SplitOut\Framework\Request;
use SplitOut\Framework\Response;

class LoginController extends Controller {

   protected $auth;
   
   public function __construct(Authentication $auth) {
      $this->auth = $auth;
   }

   public function execute(Request $request, Response $response) {
      if ($this->auth->isValid($request->getPost('username'), $request->getPost('passwd'))) {
         $response->addData('username', $request->getPost('username'));
         return true;
      }
      return false;
   }
}
