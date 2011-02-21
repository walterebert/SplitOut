<?php

namespace SplitOut\Model;

class EventTest extends \PHPUnit_Framework_TestCase {

   /**
    * @expectedException SplitOut\Model\EventException
    */
   public function testUsingEmptyTitleThrowsException() {
      $event = new Event('');
   }

}
