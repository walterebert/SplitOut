<?php

namespace SplitOut\Application;

use SplitOut\Framework\Request;

require __DIR__ . '/../src/autoload.php';

$request = new Request(array('username' => 'nobody', 'passwd' => 'secret'));

$loginController = new LoginController();
$loginController->execute($request);

var_dump($request);
