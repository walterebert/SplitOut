<?php

namespace SplitOut\Application;

use SplitOut\Framework\Request;
use SplitOut\Framework\Response;

require __DIR__ . '/../src/autoload.php';

$request = new Request(array('username' => 'nobody', 'passwd' => 'secret'));
$response = new Response();

$loginController = new LoginController();
$loginController->execute($request, $response);

var_dump($response);
