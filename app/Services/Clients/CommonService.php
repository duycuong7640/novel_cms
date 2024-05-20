<?php

namespace App\Services\Clients;

use App\Helpers\FormatDataHelpers;
use App\Services\Common\CommonCategoryService;

class CommonService
{
    private $clientSettingService;
    private $commonCategoryService;
    private $photoService;

    public function __construct(ClientSettingService $clientSettingService,
                                CommonCategoryService $commonCategoryService,
                                ClientPhotoService $photoService)
    {
        $this->clientSettingService = $clientSettingService;
        $this->commonCategoryService = $commonCategoryService;
        $this->photoService = $photoService;
    }

    public function commonDataSite($data = [])
    {
        return [
            'setting' => $this->clientSettingService->findFirst(),
            'logo' => FormatDataHelpers::formatClient($this->photoService->findByLogo('logo'), \dataKey::LOGO),
            'category_list' => $this->commonCategoryService->getListMenu(['multi' => 1, 'active_menu' => $data])
        ];
    }

}
