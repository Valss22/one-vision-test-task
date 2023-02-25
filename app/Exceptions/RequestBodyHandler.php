<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Exception;


class RequestBodyHandler extends Exception
{

    public function render($request, $errorMessages)
    {
        return response()->json(['error' => $errorMessages], 422);
    }
}
