<?php

namespace App\Http\Controllers;

use App\Http\Service\AuthService;
use Illuminate\Http\Request;

///**
// * @SWG\SecurityScheme(
// *   securityDefinition="APIKeyHeader",
// *   type="apiKey",
// *   in="header",
// *   name="Authentication",
// * )
// */


class AuthController extends Controller
{
    public $authService = null;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        //$this->middleware('jwt.auth', ['except' => ['login', 'register']]);
        $this->authService = new AuthService();
    }


    public function login(Request $request)
    {
        return $this->authService->login($request);
    }

    public function register(Request $request)
    {
        return $this->authService->register($request);
    }


    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    public function changePassWord(Request $request)
    {
        return $this->authService->changePassword($request);
    }

}
