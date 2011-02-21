<?php

namespace SplitOut\Model;

class Event {

   protected $sessions = array();
   protected $title;
    
   public function __construct($title) {
      if (!is_string($title) || $title=='') {
         throw new EventException('Title must be a string and not empty');
      }
      $this->title = $title;
   }

   public function getTitle() {
      return $this->title;
   }

   public function addSession(Session $session) {
      $this->sessions[] = $session;
   }
   
}

class EventException extends \Exception {}
