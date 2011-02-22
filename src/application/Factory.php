<?php

namespace SplitOut\Application;

class Factory {


   public function getInstanceFor($classname) {
      switch ($classname) {
         default: throw new FactoryException("'$classname' is unknown");
         case 'Authentication': {
            return new Authentication();
         }
         case 'LoginController': {
            return new LoginController($this->getInstanceFor('Authentication'));
         }
      }
   }

}

class FactoryException extends \Exception {}
