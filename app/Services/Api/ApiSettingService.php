<?php

namespace App\Services\Api;

use App\Helpers\Helpers;
use App\Repositories\Settings\SettingRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ApiSettingService
{
    private $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function first(): object
    {
        return $this->settingRepository->first();
    }

}
