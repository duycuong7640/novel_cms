<?php

namespace App\Services\Clients;

use App\Repositories\Settings\SettingRepositoryInterface;

class ClientSettingService
{
    private $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function findFirst(){
        return $this->settingRepository->findFirstDESC();
    }

}
