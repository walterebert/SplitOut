<?php

namespace SplitOut\Model;

class Session {

   protected $title;
   protected $presenters = array();
   protected $comments = array();
   
   public function __construct($title, Presenter $presenter) {
      if (!is_string($title) || $title=='') {
         throw new SessionException('Title must be a string and not empty');
      }
      $this->title = $title;
      $this->presenters[] = $presenter;
   }
   
   public function addPresenter(User $presenter) {   
      
      if ($this->presenters[0] instanceOf ToBeAnnouncedUser) {
         $this->presenters[0] = $presenter;
      } else {
         $this->presenters[] = $presenter;
      }
   }
   
   public function getPresenters() {
      return $this->presenters;
   }

   public function removePresenter(Presenter $presenter) {
      foreach (array_keys($this->presenters) as $key) {
         if ($this->presenters[$key] == $presenter) {
            unset($this->presenters[$key]);
            break;
         }
      }
      $this->presenters = array_values($this->presenters);
   }
   
   public function addComment(Comment $comment) {
      $this->comments[] = $comment;
   }
   
   public function getComments() {
      return $this->comments;
   }
}

class SessionException extends \Exception {}
