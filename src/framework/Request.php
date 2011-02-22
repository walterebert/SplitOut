<?php

namespace SplitOut\Framework;

class Request {

   protected $post;

   public function __construct(array $post) {
      $this->post = $post;
   }

   public function getPost($key) {
      return $this->post[$key];
   }

}
