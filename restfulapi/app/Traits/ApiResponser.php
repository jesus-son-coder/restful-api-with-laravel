<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{

    private function successResponse($data="", $message="", $code=200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse($message, $code=200)
    {
        return response()->json([
            'error' => $message,
            'code' => $code
        ], $code);
    }

    protected function showAll(Collection $collection, $message="", $code = 200)
    {
        return $this->successResponse( $collection, $message, $code);
    }

    protected function showOne(Model $model, $message="", $code = 200)
    {
        return $this->successResponse($model, $message, $code);
    }


}
