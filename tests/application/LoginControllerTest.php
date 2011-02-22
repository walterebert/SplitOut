<?php

namespace SplitOut\Application;

use SplitOut\Framework\Request;
use SplitOut\Framework\Response;
use SplitOut\Application\LoginController;

class LoginControllerTest extends \PHPUnit_Framework_TestCase {

   public function testLoginWorksForValidCredentials() {
      $request = new Request(array('username' => 'nobody', 'passwd' => 'secret'));
      $response = $this->getMock('SplitOut\Framework\Response');
      $response->expects($this->at(0))
               ->method('addData')
               ->with($this->equalTo('display'),$this->equalTo('Welcome home!'));
      $response->expects($this->at(1))
               ->method('addData')
               ->with($this->equalTo('loginSuccess'),$this->equalTo(true));
      
      $auth = $this->getMock('SplitOut\Application\Authentication');
      $auth->expects($this->once())
           ->method('isValid')
           ->with($this->equalTo('nobody'),$this->equalTo('secret'))
           ->will($this->returnValue(true));
      
      $controller = new LoginController($auth);
      $controller->execute($request, $response);
   }

   public function testLoginFailsForInvalidCredentials() {
      $request = new Request(array('username' => 'nobody', 'passwd' => 'secret'));
      $response = $this->getMock('SplitOut\Framework\Response');
      $response->expects($this->at(0))
               ->method('addData')
               ->with($this->equalTo('display'),$this->equalTo('Please check your credentials'));
      $response->expects($this->at(1))
               ->method('addData')
               ->with($this->equalTo('loginSuccess'),$this->equalTo(false));
      
      $auth = $this->getMock('SplitOut\Application\Authentication');
      $auth->expects($this->once())
           ->method('isValid')
           ->with($this->equalTo('nobody'),$this->equalTo('secret'))
           ->will($this->returnValue(false));
      
      $controller = new LoginController($auth);
      $controller->execute($request, $response);
   }

}
