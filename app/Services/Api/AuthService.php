<?php

namespace App\Services\Api;

use App\Helpers\Helpers;
use App\Helpers\ResponseHelpers;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{

    public function __construct()
    {
    }

    public function login($credentials): JsonResponse
    {
        try {
            $credentials['status'] = 1;
            $credentials['user_type'] = \dataUser::USER['USER_TYPE']['CLIENT'];
            if (!$token = JWTAuth::attempt($credentials)) {
                return ResponseHelpers::responseNotFound();
            }
            return ResponseHelpers::responseSuccess($this->createNewToken($token));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    protected function createNewToken($token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => (int)auth()->factory()->getTTL(),
//            'user' => auth()->user()
        ];
    }

}
