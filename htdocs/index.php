<?php

namespace SplitOut\Application;

use SplitOut\Framework\Request;
use SplitOut\Framework\Response;

require __DIR__ . '/../src/autoload.php';

$request = new Request(array('username' => 'nobody', 'passwd' => 'secret'));
$response = new Response();

$workflow = new AjaxWorkflow();
$view = $workflow->execute($request, $response);

echo $view->render($response);
