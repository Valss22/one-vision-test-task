<?php

use Illuminate\Http\Request;
use App\Exceptions\RequestBodyHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

function validateRequestBody(Request $request, array $rules): array|HttpException {
    try 
    {
        $validatedData = $request->validate($rules);
        return $validatedData;
    } 
    catch (\Illuminate\Validation\ValidationException $e) 
    {        
        abort(422);
    }
}