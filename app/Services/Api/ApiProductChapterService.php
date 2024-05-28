<?php

namespace App\Services\Api;

use App\Helpers\ApiFormatDataHelpers;
use App\Helpers\FormatDataHelpers;
use App\Helpers\Helpers;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\ProductChapters\ProductChapterRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApiProductChapterService
{
    private $productChapterRepository;

    public function __construct(ProductChapterRepositoryInterface $productChapterRepository)
    {
        $this->productChapterRepository = $productChapterRepository;
    }

    public function apiGetDetail($_slug)
    {
        $detail = $this->productChapterRepository->apiGetDetail($_slug);
        $detail->product;
        $detail->next = $this->productChapterRepository->apiDetailChapterForRank($detail->product_id, $detail->rank + 1);
        $detail->pre = $this->productChapterRepository->apiDetailChapterForRank($detail->product_id, $detail->rank - 1);

        return $detail;
    }

}
