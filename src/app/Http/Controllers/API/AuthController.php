<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Response\ApiResponse;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $this->login($request, $user);
        return $this->registered($request, $user);
    }

    protected function registered(Request $request, $user)
    {
        $user->generateToken();

        return ApiResponse::getResponse('201 OK', null,  $user);
    }

    public function login(Request $request)
    {
        $token = $request->header('authorization');
        $text = " ";
        $pos = strpos($token, $text);
        $token = substr($token, $pos + 1);

        $credentials = $request->only('name', 'email');

        if (Auth::attempt($request->all())) {
            $user = Auth::user();
            if ($user->api_token === $token) {

            $user->generateToken();

            return ApiResponse::getResponse('200 OK User login successfully', null, $user);
          } else {

                return ApiResponse::getResponse('401 Unauthorized', "Incorrect token", $credentials);
            }
        } else {
           return ApiResponse::getResponse('401 Unauthorized', null,  $credentials);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return ApiResponse::getResponse('200 OK User logged out', null,  null);
    }
}
