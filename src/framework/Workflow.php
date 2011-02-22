<?php

namespace SplitOut\Framework;

abstract class Workflow {

   abstract protected function doExecute(Request $request, Response $response);
   
   public function execute(Request $request, Response $response) {
      $result = $this->doExecute($request, $response);
      if (!$result instanceof View) {
         throw new WorkflowException('result is not an instance of View');
      }
      return $result;
   }
   
}

class WorkflowException extends \Exception {}
