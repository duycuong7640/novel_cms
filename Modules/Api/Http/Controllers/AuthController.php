<?php

namespace Modules\Api\Http\Controllers;

use App\Helpers\ApiFormatDataHelpers;
use App\Helpers\Helpers;
use App\Helpers\ResponseHelpers;
use App\Services\Api\ApiUserService;
use App\Services\Api\ApiUserSpendService;
use App\Services\Api\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Api\Http\Requests\Auth\LoginRequest;
use Modules\Api\Http\Requests\Auth\RegisterRequest;
use Modules\Api\Http\Requests\Auth\UpdateRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public $authService;
    public $apiUserService;

    public function __construct(AuthService $authService, ApiUserService $apiUserService)
    {
        $this->authService = $authService;
        $this->apiUserService = $apiUserService;
    }

    /**
     * @OA\POST(
     *     path="/v1/auth/login",
     *     tags={"Auth"},
     *     @OA\Parameter(
     *        name="email", in="query", required=true, @OA\Schema(type="email")
     *     ),
     *     @OA\Parameter(
     *        name="password", in="query", required=true, @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            return $this->authService->login($request->validated());
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\POST(
     *     path="/v1/auth/register",
     *     tags={"Auth"},
     *     @OA\Parameter(
     *        name="email", in="query", required=true, @OA\Schema(type="email")
     *     ),
     *     @OA\Parameter(
     *        name="password", in="query", required=true, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="first_name", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="birthday", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="gender", in="query", required=false, @OA\Schema(type="number")
     *     ),
     *     @OA\Parameter(
     *        name="phone", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="address", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $register = $this->apiUserService->store($request->validated());
            return ResponseHelpers::responseSuccess();
        } catch (\Exception $e) {Helpers::pre($e->getMessage());
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\GET(
     *     path="/v1/auth/me",
     *     tags={"Auth"},
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function me(): JsonResponse
    {
        try {
            $me = $this->apiUserService->me();
            if ($me->status == \dataUser::USER['STATUS']["N-ACTIVE"]) return ResponseHelpers::responseNotFound();
            return ResponseHelpers::responseSuccess(ApiFormatDataHelpers::format($me, \dataKey::USER));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\PATCH (
     *     path="/v1/auth/update",
     *     tags={"Auth"},
     *     @OA\Parameter(
     *        name="first_name", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="password", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="birthday", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="gender", in="query", required=false, @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *        name="phone", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="address", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="thumbnail", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="is_push_notify", in="query", required=false, @OA\Schema(type="boolean")
     *     ),
     *     @OA\Parameter(
     *        name="is_send_mail", in="query", required=false, @OA\Schema(type="boolean")
     *     ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function update(UpdateRequest $request): JsonResponse
    {
        try {
            $user = JWTAuth::user();
            $update = $this->apiUserService->update($request->validated(), $user->uuid);
            if ($update) return ResponseHelpers::responseSuccess($update);
            return ResponseHelpers::responseServerError();
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\GET(
     *     path="/v1/auth/points/history",
     *     tags={"Gacha"},
     *     @OA\Parameter(
     *        name="Authorization", in="header", required=true, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="limit", in="query", required=false, @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *        name="page", in="query", required=false, @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *        name="orderField", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function pointHistory(Request $request): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess(ApiFormatDataHelpers::formatList($this->apiUserSpendService->apiGetAll($request->all()), \dataKey::USER_SPEND));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

}
