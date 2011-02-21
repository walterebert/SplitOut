<?php

namespace SplitOut\Model;

class Session {

   protected $presenters;
   protected $comments = array();
   
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
   
   public function addComment(Comment $comment) {
      $this->comments[] = $comment;
   }
   
   public function getComments() {
      return $this->comments;
   }
}

