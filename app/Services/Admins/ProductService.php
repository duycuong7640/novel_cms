<?php

namespace App\Services\Admins;

use App\Helpers\Helpers;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Services\Common\CommonCategoryService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductService
{
    private $productRepository;
    private $commonCategoryService;

    public function __construct(ProductRepositoryInterface $productRepository, CommonCategoryService $commonCategoryService)
    {
        $this->productRepository = $productRepository;
        $this->commonCategoryService = $commonCategoryService;
    }

    public function getList($_data = [])
    {
//        $products = $this->productRepository->getAll(['limit' => 3000]);
//        foreach ($products as $row){
//            $d['slug'] = Str::slug($row->title, '-');
//            $this->productRepository->update($row->uuid, $d);
//        }
//        die;

        if (request()->has('title')) {
            $_SESSION["keyword_cate"] = request()->get('title');
        }
        $_data['title'] = isset($_SESSION["keyword_cate"]) ? $_SESSION["keyword_cate"] : '';

        if (request()->has('parent_id')) {
            $_SESSION["keyword_parent_id"] = request()->get('parent_id');
        }
        $_data['parent_id'] = isset($_SESSION["keyword_parent_id"]) ? $this->commonCategoryService->multiCate($_SESSION["keyword_parent_id"]) : '';

        return $this->productRepository->getAll($_data);
    }

    public function create($_data = [])
    {
        $_data['uuid'] = Helpers::buildUUID();
        $_data['user_id'] = Auth::guard(\dataAuth::AUTH['GUARD']['ADMIN'])->user()->id;
        $_data['category_multi'] = !empty($_data['category_multi']) ? '|' . implode('|', $_data['category_multi']) . '|' : '';
        return $this->productRepository->create($_data);
    }

    public function find($_id)
    {
        return $this->productRepository->find($_id);
    }

    public function update($_id, $_data)
    {
        $_data['category_multi'] = !empty($_data['category_multi']) ? '|' . implode('|', $_data['category_multi']) . '|' : '';
        return $this->productRepository->update($_id, $_data);
    }

    public function destroy($_id)
    {
        return $this->productRepository->delete($_id);
    }

}
