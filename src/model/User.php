<?php

namespace SplitOut\Model;

use SplitOut\Application\Helper;

class User extends AbstractUser implements Presenter {

   public function __construct($name) {
      $this->name = $name;
   }
    
}

