<?php

namespace SplitOut\Model;

class Session {

   protected $presenters;
   
   public function __construct() {
      $this->presenters = new \SplObjectStorage();
   }
   
   public function addPresenter(User $presenter) {
      $this->presenters->attach($presenter);
   }
   
   public function getPresenters() {
      return $this->presenters;
   }

   public function removePresenter(User $presenter) {
      $this->presenters->detach($presenter);
   }
}

