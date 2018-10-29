<?php
/**
 * Created by PhpStorm.
 * User: mironova_na
 * Date: 08.10.2018
 * Time: 11:56
 */

namespace App\Http\Response;

class ApiResponse
{
    public function __construct()
    {

    }

    public static function getResponse($status, $error, $data)
    {
        $array = [
            'status' => $status,
            'error' => $error,
            'data' => $data,
        ];

        return response()->json($array);
    }

}