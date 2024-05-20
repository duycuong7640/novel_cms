<?php

namespace App\Services\Admins;

use App\Helpers\Helpers;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Services\Common\CommonCategoryService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostService
{
    private $postRepository;
    private $commonCategoryService;

    public function __construct(PostRepositoryInterface $postRepository, CommonCategoryService $commonCategoryService)
    {
        $this->postRepository = $postRepository;
        $this->commonCategoryService = $commonCategoryService;
    }

    public function getList($_data = [])
    {
        if (request()->has('title')) {
            $_SESSION["keyword_cate"] = request()->get('title');
        }
        $_data['title'] = isset($_SESSION["keyword_cate"]) ? $_SESSION["keyword_cate"] : '';

        if (request()->has('parent_id')) {
            $_SESSION["keyword_parent_id"] = request()->get('parent_id');
        }
        $_data['parent_id'] = isset($_SESSION["keyword_parent_id"]) ? $this->commonCategoryService->multiCate($_SESSION["keyword_parent_id"]) : '';

        return $this->postRepository->getAll($_data);
    }

    public function create($_data = [])
    {
        $_data['uuid'] = Helpers::buildUUID();
        $_data['user_id'] = Auth::guard(\dataAuth::AUTH['GUARD']['ADMIN'])->user()->id;
        $_data['category_multi'] = !empty($_data['category_multi']) ? '|' . implode('|', $_data['category_multi']) . '|' : '';
        return $this->postRepository->create($_data);
    }

    public function find($_id)
    {
        return $this->postRepository->find($_id);
    }

    public function update($_id, $_data)
    {
        $_data['category_multi'] = !empty($_data['category_multi']) ? '|' . implode('|', $_data['category_multi']) . '|' : '';
        return $this->postRepository->update($_id, $_data);
    }

    public function destroy($_id)
    {
        return $this->postRepository->delete($_id);
    }

}
