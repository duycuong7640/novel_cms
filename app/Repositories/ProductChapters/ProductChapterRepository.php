<?php

namespace App\Repositories\ProductChapters;

use App\Helpers\Helpers;
use App\Models\Product;
use App\Models\ProductChapter;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class ProductChapterRepository extends BaseRepository implements ProductChapterRepositoryInterface
{

    public function getModel()
    {
        return ProductChapter::class;
    }

    public function apiGetDetail($_id)
    {
        return $this->model->where('status', \dataCategory::ACTIVE)->where('id', $_id)->first();
    }

    public function apiDetailChapterForRank($_productId, $_rank)
    {
        return $this->model->select('id', 'uuid', 'title', 'slug', 'rank')
            ->where('status', \dataCategory::ACTIVE)
            ->where('product_id', $_productId)
            ->where('rank', $_rank)
            ->first();
    }
}
