<?php

namespace App\Repositories\Settings;

use App\Repositories\RepositoryInterface;

interface SettingRepositoryInterface extends RepositoryInterface
{
    public function first();
}
