<?php

namespace App\Services\Api;

use App\Helpers\ApiFormatDataHelpers;
use App\Helpers\FormatDataHelpers;
use App\Helpers\Helpers;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApiCategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function apiGetAll($_data = [])
    {
        return $this->categoryRepository->apiGetAll($_data);
    }

    public function findBySlug($_slug)
    {
        return $this->categoryRepository->findByColumn('slug', $_slug);
    }

}
