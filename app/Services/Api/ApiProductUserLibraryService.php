<?php

namespace App\Services\Api;

use App\Helpers\Helpers;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\ProductUserLibraries\ProductUserLibraryRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiProductUserLibraryService
{
    private $productUserLibraryRepository;

    public function __construct(ProductUserLibraryRepositoryInterface $productUserLibraryRepository)
    {
        $this->productUserLibraryRepository = $productUserLibraryRepository;
    }

    public function apiGetAll($_data = [])
    {
        $user = JWTAuth::user();
        $_data['user_id'] = $user->id;
        return $this->formatDataProductUserLibrary($this->productUserLibraryRepository->apiGetAll($_data));
    }

    public function apiGetAllList($_data = [])
    {
        $user = JWTAuth::user();
        $_data['user_id'] = $user->id;
        return $this->productUserLibraryRepository->apiGetAllList($_data);
    }

    public function formatDataProductUserLibrary($_data = [], $type = '')
    {
        foreach ($_data as $row){
            $row->product;
            $row->product->latestChapters;
        }

        return $_data;
    }

    public function apiGetDetail($_id)
    {
        $detail = $this->productUserLibraryRepository->apiGetDetail($_id);

        return $detail;
    }

    public function create($_data = [])
    {
        $detail = $this->productUserLibraryRepository->findByColumn('product_id', $_data['product_id']);
        if ($detail) return true;
        $user = JWTAuth::user();
        $_data['uuid'] = Helpers::buildUUID();
        $_data['user_id'] = $user->id;
        return $this->productUserLibraryRepository->create($_data);
    }

    public function delete($id){
        return $this->productUserLibraryRepository->delete($id);
    }

}
