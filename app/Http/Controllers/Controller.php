<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @param $data
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function successJsonResponse($data, $message, $statusCode)
    {
        return response([
            'status' => 'Success',
            'data' => $data,
            'message' => $message
        ], $statusCode);
    }

    /**
     * @param $message
     * @param $statusCode
     * @param $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function errorJsonResponse($message, $statusCode, $data = [])
    {
        return response([
            'status' => 'Error',
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}
