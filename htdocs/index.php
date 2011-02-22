<?php

namespace SplitOut\Application;

use SplitOut\Framework\Request;
use SplitOut\Framework\Response;

require __DIR__ . '/../src/autoload.php';

$request = new Request(array('username' => 'nobody', 'passwd' => 'secret'));
$response = new Response();
$auth = new Authentication();

$loginController = new LoginController($auth);
$loginController->execute($request, $response);

var_dump($response);
