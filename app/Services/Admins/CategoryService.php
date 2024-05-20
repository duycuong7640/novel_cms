<?php

namespace App\Services\Admins;

use App\Helpers\Helpers;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
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
        $_data['parent_id'] = isset($_SESSION["keyword_parent_id"]) ? $_SESSION["keyword_parent_id"] : '';

        return $this->categoryRepository->getAll($_data);
    }

    public function create($_data = [])
    {
        $_data['uuid'] = Helpers::buildUUID();
        $_data['user_id'] = Auth::guard(\dataAuth::AUTH['GUARD']['ADMIN'])->user()->id;
        $_slug = !empty($_data['title']) ? Str::slug($_data['title'], '-') : '';
        $_data["slug"] = self::checkSlug($_slug, $_slug, 0);

        return $this->categoryRepository->create($_data);
    }

    public function checkSlug($_slug, $slug_tmp, $i = 0)
    {
        $row = $this->categoryRepository->findByColumn('slug', $slug_tmp);
        if (!empty($row->id)) {
            $i++;
            return self::checkSlug($_slug, $_slug . "-" . $i, $i);
        } else {
            return $slug_tmp;
        }
    }

    public function find($_id)
    {
        return $this->categoryRepository->find($_id);
    }

    public function update($_detail, $_data)
    {
        if ($_detail->title == $_data["title"]) {
            $_data["slug"] = $_detail->slug ? $_detail->slug : self::checkSlug(Str::slug($_data["title"], "-"), Str::slug($_data["title"], "-"), 0);
        } else {
            $_data["slug"] = self::checkSlug(Str::slug($_data["title"], "-"), Str::slug($_data["title"], "-"), 0);
        }

        $_data = array_merge($_data, [
            'updated_at' => date("Y/m/d H:i:s")
        ]);

        return $this->categoryRepository->update($_detail->uuid, $_data);
    }

    public function destroy($_id)
    {
        return $this->categoryRepository->delete($_id);
    }

}
