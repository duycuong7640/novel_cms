<?php

namespace App\Services\Admins;

use App\Helpers\Helpers;
use App\Repositories\Settings\SettingRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class SettingService
{
    private $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function create($_data = [])
    {
        $_data['uuid'] = Helpers::buildUUID();
        $_data['user_id'] = Auth::guard(\dataAuth::AUTH['GUARD']['ADMIN'])->user()->id;
        return $this->settingRepository->create($_data);
    }

    public function find($_id)
    {
        $detail = $this->settingRepository->find($_id);
        if(empty($detail->id)){
            return $this->settingRepository->create([
                'uuid' => Helpers::buildUUID(),
                'user_id' => Auth::guard(\dataAuth::AUTH['GUARD']['ADMIN'])->user()->id
            ]);
        }
        return $detail;
    }

    public function update($_detail, $_data)
    {
        $_data = array_merge($_data, [
            'updated_at' => date("Y/m/d H:i:s")
        ]);
        return $this->settingRepository->update($_detail->uuid, $_data);
    }

}
