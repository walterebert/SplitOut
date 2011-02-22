<?php

namespace SplitOut\Application;

class Helper {
   
   public static function hashPassword($passwd) {
      return md5('mut5fewafd36frxdwz65u45xwgrfdec 2' . $passwd);
   }
}
