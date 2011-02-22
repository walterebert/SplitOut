<?php

namespace SplitOut\Application;

use SplitOut\Framework\Request;
use SplitOut\Framework\Response;
use SplitOut\Application\LoginController;

class LoginControllerTest extends \PHPUnit_Framework_TestCase {

   protected $post = array('username' => 'nobody', 'passwd' => 'secret');

   protected $request;
   protected $response;
   protected $auth;

   public function setUp() {
      $this->request = new Request($this->post);
      $this->response = $this->getMock('SplitOut\Framework\Response');
      $this->response->expects($this->at(0))
                     ->method('addData')
                     ->with($this->equalTo('display'));
      
      $this->auth = $this->getMock('SplitOut\Application\Authentication');
   }

   public function testLoginWorksForValidCredentials() {
      $this->auth->expects($this->once())
                 ->method('isValid')
                 ->with($this->equalTo($this->post['username']),
                        $this->equalTo($this->post['passwd']))
                 ->will($this->returnValue(true));
      
      $controller = new LoginController($this->auth);
      $this->assertTrue($controller->execute($this->request, $this->response));
   }

   public function testLoginFailsForInvalidCredentials() {
      $this->auth->expects($this->once())
                 ->method('isValid')
                 ->with($this->equalTo($this->post['username']),
                        $this->equalTo($this->post['passwd']))
                 ->will($this->returnValue(false));
      
      $controller = new LoginController($this->auth);
      $this->assertFalse($controller->execute($this->request, $this->response));
   }

}
