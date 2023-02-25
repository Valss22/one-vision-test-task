<?php
namespace App\Services;

require_once app_path('helpers.php');

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;


class UserService
{
    public function createUser(Request $request): HttpException|User
    {   
        $validatedData = validateRequestBody($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
        ]);

        return User::create([
            ...$validatedData,
            'password' => bcrypt($data['password'])
        ]);
    }
}