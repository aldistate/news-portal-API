<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const RESPONSE_SUCCESS = true;
    const RESPONSE_ERROR = false;

    protected function jsonRes($message, $status = self::RESPONSE_ERROR, $responseCode = 400)
    {

        if ($status == self::RESPONSE_SUCCESS) {
            $responseCode = 200;
            $data = $message;
        }
        $response = [
            "code" => (string) $responseCode,
            "status" => $status,
            "data" => $message,
        ];
        return response()->json($response, $responseCode);
    }
}
