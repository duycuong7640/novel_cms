<?php

namespace App\Repositories\Categories;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getListMenu($_data);

    public function findListParentId($_id);

    public function apiGetAll($_params);
}
