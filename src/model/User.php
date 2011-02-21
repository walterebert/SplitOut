<?php

namespace SplitOut\Model;

class User extends AbstractUser {

   public function __construct($name) {
      $this->name = $name;
   }
    
}

