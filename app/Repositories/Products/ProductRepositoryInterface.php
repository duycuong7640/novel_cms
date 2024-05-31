<?php

namespace App\Repositories\Products;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function apiGetAll($_params);
    public function apiGetAllSearch($_params);
    public function apiGetDetail($_slug);
    public function apiGetNewTop($_params);
    public function apiGetRankingDay($_params);
    public function apiGetRankingWeek($_params);
    public function apiGetRankingMonth($_params);
    public function apiGetRecommendations($_params);
}
