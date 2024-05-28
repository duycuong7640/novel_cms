<?php

namespace App\Repositories\ProductChapters;

use App\Repositories\RepositoryInterface;

interface ProductChapterRepositoryInterface extends RepositoryInterface
{
    public function apiGetDetail($_id);
    public function apiDetailChapterForRank($_productId, $_rank);
}
