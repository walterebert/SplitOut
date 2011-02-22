<?php

namespace SplitOut\Model;

use SplitOut\Application\Helper;

class User extends AbstractUser implements Presenter {

   protected $password = 'secret';

   public function __construct($name) {
      $this->name = $name;
   }
   
   public function getPassword() {
      return Helper::hashPassword($this->password);
   }
    
}

