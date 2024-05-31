<?php

namespace App\Services\Api;

use App\Helpers\ApiFormatDataHelpers;
use App\Helpers\FormatDataHelpers;
use App\Helpers\Helpers;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApiProductService
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function apiGetAll($_data = [])
    {
        if (!empty($_data['category_id'])) {
            $categories = $this->categoryRepository->apiGetAll(['limit' => 100]);
            $categoryIds[$_data['category_id']] = $_data['category_id'];
            foreach ($categories as $row) {
                if ($row->parent_id == $_data['category_id']) {
                    $categoryIds[$row->id] = $row->id;
                }
            }

            $_data['category_id'] = $categoryIds;
        }

        if (isset($_data['isLatestChapters']) && $_data['isLatestChapters']) {
            return $this->formatDataProduct($this->productRepository->apiGetAll($_data), 'LatestChapters');
        }
        return $this->productRepository->apiGetAll($_data);
    }

    public function apiGetAllSearch($_data = [])
    {
        if (empty($_data['keyword'])) return [];
        if (!empty($_data['keyword']) && strlen($_data['keyword']) < 5) return [];
        return $this->productRepository->apiGetAllSearch($_data);
    }

    public function apiGetNewTop($_data = [])
    {
//        if (isset($_data['isCategory']) && $_data['isCategory']) {
//            return $this->formatDataProduct($this->productRepository->apiGetNewTop($_data), 'isCategory');
//        }
        return $this->productRepository->apiGetNewTop($_data);
    }

    public function apiGetDetail($_id)
    {
        $detail = $this->productRepository->apiGetDetail($_id);
        $detail->category;
        $detail->author;
        $detail->listChapters;

        return $detail;
    }

    public function apiGetSitebarRightNovel($_data = [])
    {
        return [
            'ranking' => [
                'day' => $this->productRepository->apiGetRankingDay($_data),
                'week' => $this->productRepository->apiGetRankingWeek($_data),
                'month' => $this->productRepository->apiGetRankingMonth($_data),
            ],
            'recommendations' => $this->productRepository->apiGetRecommendations($_data),
        ];
    }

    public function formatDataProduct($_data = [], $type = '')
    {
        if ($type == 'LatestChapters') {
            foreach ($_data as $key => $row) {
                $row->latestChapters;
                $_data[$key] = $row;
            }
        }else if($type == 'isCategory'){
            foreach ($_data as $key => $row) {
                $row->category;
                $_data[$key] = $row;
            }
        }

        return $_data;
    }

    public function find($_id)
    {
//        return ApiFormatDataHelpers::format($this->productRepository->findByIdActiveRecord($_id), \dataKey::PRODUCT);
    }

}
