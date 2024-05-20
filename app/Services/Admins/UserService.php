<?php

namespace App\Services\Admins;

use App\Helpers\Helpers;
use App\Models\User;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepository;
    private $model;

    public function __construct(UserRepositoryInterface $userRepository, User $model)
    {
        $this->userRepository = $userRepository;
        $this->model = $model;
    }

    public function getListUsers($params)
    {
        return $this->userRepository->getAll($params);
    }

    public function store($data)
    {
        $data = Arr::only($data, $this->model->fillable);
        $data['password'] = Hash::make($data['password']);
        $data['type'] = empty($data['type']) ? 'user' : $data['type'];
        if ($this->userRepository->create($data)) {
            return $this->userRepository->find($data['uuid']);
        }
        return false;
    }

    public function update($data, $id)
    {
        $data = Arr::only($data, $this->model->fillable);
        if (!empty($data['password'])) $data['password'] = Hash::make($data['password']);
        if ($this->userRepository->update($id, $data)) {
            return $this->userRepository->find($id);
        }
        return false;
    }

    public function findFirst($id)
    {
        return $this->userRepository->find($id);
    }
}
