<?php

namespace App\Services\Api;

use App\Helpers\ApiFormatDataHelpers;
use App\Helpers\Helpers;
use App\Helpers\ResponseHelpers;
use App\Models\User;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiUserService
{
    private $userRepository;
    private $model;

    public function __construct(UserRepositoryInterface $userRepository, User $model)
    {
        $this->userRepository = $userRepository;
        $this->model = $model;
    }

    public function store($data): JsonResponse
    {
        $data = Arr::only($data, $this->model->fillable);
        $data['uuid'] = Helpers::buildUUID();
        $data['password'] = Hash::make($data['password']);
        $data['user_type'] = \dataUser::USER["USER_TYPE"]["CLIENT"];
        $data['email_verified_at'] = \Carbon\Carbon::now();
        if ($this->userRepository->create($data)) {
            return ResponseHelpers::responseSuccess($this->userRepository->findByUUID($data['uuid']));
        }
        return ResponseHelpers::responseServerError();
    }

    public function update($data, $id, $exception = false)
    {
        $data = Arr::only($data, $this->model->fillable);
        if (!empty($data['password'])) $data['password'] = Hash::make($data['password']);

        if (!$exception) {
            if (isset($data['total_point'])) unset($data['total_point']);
        }

        if (isset($data['first_name'])) $data['first_name'] = strip_tags($data['first_name']);
        if (isset($data['birthday'])) $data['birthday'] = strip_tags($data['birthday']);
        if (isset($data['phone'])) $data['phone'] = strip_tags($data['phone']);
        if (isset($data['address'])) $data['address'] = strip_tags($data['address']);
        if (isset($data['thumbnail'])) $data['thumbnail'] = strip_tags($data['thumbnail']);

        if ($this->userRepository->update($id, $data)) {
            $detail = $this->userRepository->findByUUID($id);
            $detail->point = $detail->total_point;
            unset($detail->customer_id);
            unset($detail->total_point);
            return ApiFormatDataHelpers::format($detail, \dataKey::USER);
        }
        return false;
    }

    public function findFirst($id)
    {
        return $this->userRepository->findByIdActiveRecord($id);
    }

    public function me(): object
    {
        $user = JWTAuth::user();
        $user->point = $user->total_point;
        unset($user->customer_id);
        unset($user->total_point);
        return $user;
    }

    public function updatePoint($user, $point)
    {
        return $this->userRepository->update($user->uuid, ['total_point' => $point]);
    }

    public function updateCustomerId($user, $customerId)
    {
        return $this->userRepository->update($user->uuid, ['customer_id' => $customerId]);
    }

}
