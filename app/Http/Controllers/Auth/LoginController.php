<?php
namespace App\Http\Controllers\Auth;

require_once app_path('helpers.php');

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request): HttpException|JsonResponse
    {
        $validatedData = validateRequestBody($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

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
