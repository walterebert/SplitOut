<?php

namespace SplitOut\Framework;

class Response {

   protected $data = array();

   public function addData($key, $value) {
      $this->data[$key] = $value;
   }
   
   public function getData($key) {
      return $this->data[$key];
   }

}
