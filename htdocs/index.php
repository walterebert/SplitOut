<?php

namespace SplitOut\Application;

use SplitOut\Framework\Request;
use SplitOut\Framework\Response;

require __DIR__ . '/../src/autoload.php';

$request = new Request(array('username' => 'nobody', 'passwd' => 'secret'));
$response = new Response();
$auth = new Authentication();

$loginController = new LoginController($auth);
$result = $loginController->execute($request, $response);

if ($result) {
   $view = new \SplitOut\Application\SuccessView();
} else {
   $view = new \SplitOut\Application\ErrorView();
}

echo $view->render($response);
