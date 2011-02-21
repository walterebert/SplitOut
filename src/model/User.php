<?php

namespace SplitOut\Model;

class User extends AbstractUser implements Presenter {

   public function __construct($name) {
      $this->name = $name;
   }
    
}

