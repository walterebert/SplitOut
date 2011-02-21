<?php

namespace SplitOut\Model;

class SessionTest extends \PHPUnit_Framework_TestCase {

   public function testAddingPresentersToASessionWorks() {
      $session = new Session();
      $userA = new User();
      $userB = new User();
      
      $session->addPresenter($userA);
      $session->addPresenter($userB);
      
      $this->assertContains($userA, $session->getPresenters());
      $this->assertContains($userB, $session->getPresenters());     
   }
   
   /**
    * @depends testAddingPresentersToASessionWorks
    */
   public function testRemovingPresenterFromASessionWorks() {
      $session = new Session();
      $userA = new User();
      $userB = new User();
      
      $session->addPresenter($userA);
      $session->addPresenter($userB);
   
      $session->removePresenter($userA);
      
      $this->assertContains($userB, $session->getPresenters());
      $this->assertNotContains($userA, $session->getPresenters());
   }

}
