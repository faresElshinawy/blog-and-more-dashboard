<?php

namespace App\Traits;

trait ApiResponse {

    public function apiResponse($message = null , $data = null , $errors = null , $code = 200)
    {
        $response = [];
        $response['status_code'] = $code;
        $response['message'] = $message;

        if($data && !$errors)
        {
            $response['data'] = $data;
        }
        elseif(!$data && $errors)
        {
            $response['errors'] = $errors;
        }

        return response()->json($response);
    }

}

