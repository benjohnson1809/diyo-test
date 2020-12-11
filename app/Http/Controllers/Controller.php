<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

	// custom response
	public function sendResponse($result, $message)
    {
      return response()->json([
        'data' => $result,
        'status' => true,
        'code' => 200,
        'message' => $message
      ]);
    }

    public function sendError($message)
    {
      return response()->json([
        'status' => false,
        'code' => 500,
        'message' => $message
      ]);
    }
}
