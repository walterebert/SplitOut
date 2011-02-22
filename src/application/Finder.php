<?php

namespace SplitOut\Application;

class Finder {

   public function findUserByUsername($username) {
      return new \SplitOut\Model\User('nobody');
   }

}
