<?php

use Illuminate\Http\Request;
use App\Exceptions\RequestBodyHandler;

function validateRequestBody(Request $request, array $rules) {
    try {
        $validatedData = $request->validate($rules);
        return $validatedData;
    } catch (\Illuminate\Validation\ValidationException $e) {        
        throw new RequestBodyHandler($request, 12);
    }
}