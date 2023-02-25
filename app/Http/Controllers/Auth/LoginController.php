<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try 
        {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        } 
        catch (\Illuminate\Validation\ValidationException $e)
        {
            return response()->json(['error' => $e->errors()], 422);
        }
        

        if (!Auth::attempt($validatedData)) 
        {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = auth()->user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
