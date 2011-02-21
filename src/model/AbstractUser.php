<?php

namespace SplitOut\Model;

abstract class AbstractUser {

   protected $name;

   public function getName() {
     return $this->name;
   }
   
}
