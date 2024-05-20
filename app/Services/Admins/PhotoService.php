<?php

namespace App\Services\Admins;

use App\Helpers\FormatDataHelpers;
use App\Helpers\Helpers;
use App\Repositories\Photos\PhotoRepositoryInterface;
use App\Repositories\Points\PointRepositoryInterface;
use App\Services\Common\CommonCategoryService;
use Illuminate\Support\Facades\Auth;

class PhotoService
{
    private $photoRepository;

    public function __construct(PhotoRepositoryInterface $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    public function getList($_data = [])
    {
        if (request()->has('title')) {
            $_SESSION["keyword_cate"] = request()->get('title');
        }
        $_data['title'] = isset($_SESSION["keyword_cate"]) ? $_SESSION["keyword_cate"] : '';

        return $this->photoRepository->getAll($_data);
    }

    public function create($_data = [])
    {
        $_data['uuid'] = Helpers::buildUUID();
        $_data['user_id'] = Auth::guard(\dataAuth::AUTH['GUARD']['ADMIN'])->user()->id;
        $_data['thumbnail'] = Helpers::imageThumbnail($_data['thumbnail']);
        $_data['thumbnail2'] = Helpers::imageThumbnail($_data['thumbnail2']);
        return $this->photoRepository->create($_data);
    }

    public function find($_id)
    {
        return FormatDataHelpers::format($this->photoRepository->find($_id), \dataKey::PHOTO, 'admin');
    }

    public function update($_id, $_data)
    {
        if (!empty($_data['thumbnail'])) $_data['thumbnail'] = Helpers::imageThumbnail($_data['thumbnail']);
        if (!empty($_data['thumbnail2'])) $_data['thumbnail2'] = Helpers::imageThumbnail($_data['thumbnail2']);
        return $this->photoRepository->update($_id, $_data);
    }

    public function destroy($_id)
    {
        return $this->photoRepository->delete($_id);
    }

}
