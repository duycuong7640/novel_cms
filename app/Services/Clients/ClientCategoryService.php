<?php

namespace App\Services\Clients;

use App\Repositories\Categories\CategoryRepositoryInterface;

class ClientCategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function find($_id){
        return $this->categoryRepository->find($_id);
    }

    public function findBySlug($_slug){
        return $this->categoryRepository->findByColumn('slug', $_slug);
    }

}
