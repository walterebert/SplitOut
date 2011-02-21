<?php

namespace SplitOut\Model;

class Session {

   protected $title;
   protected $presenters;
   protected $comments = array();
   
   public function __construct($title, AbstractUser $presenter) {
      if (!is_string($title) || $title=='') {
         throw new SessionException('Title must be a string and not empty');
      }
      $this->title = $title;
      $this->presenters = new \SplObjectStorage();
      $this->addPresenter($presenter);
   }
   
   public function addPresenter(AbstractUser $presenter) {
      $this->presenters->attach($presenter);
   }
   
   public function getPresenters() {
      return $this->presenters;
   }

   public function removePresenter(AbstractUser $presenter) {
      $this->presenters->detach($presenter);
   }
   
   public function addComment(Comment $comment) {
      $this->comments[] = $comment;
   }
   
   public function getComments() {
      return $this->comments;
   }
}

class SessionException extends \Exception {}
