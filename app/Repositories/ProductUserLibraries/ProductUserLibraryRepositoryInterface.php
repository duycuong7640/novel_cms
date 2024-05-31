<?php

namespace App\Repositories\ProductUserLibraries;

use App\Repositories\RepositoryInterface;

interface ProductUserLibraryRepositoryInterface extends RepositoryInterface
{
    public function apiGetAll($_params);
    public function apiGetAllList($_params);
    public function apiGetDetail($_id);
}
