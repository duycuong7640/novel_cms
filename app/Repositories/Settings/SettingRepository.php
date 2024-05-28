<?php

namespace App\Repositories\Settings;

use App\Models\Setting;
use App\Repositories\BaseRepository;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{

    public function getModel()
    {
        return Setting::class;
    }

    public function first()
    {
        return $this->model->first();
    }

}
