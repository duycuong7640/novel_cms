<?php

namespace Modules\Api\Http\Controllers;

use App\Helpers\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Services\Api\ApiPhotoService;
use App\Services\Api\ApiSettingService;
use App\Services\Common\CommonCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    private $apiSettingService;
    private $apiPhotoService;
    private $commonCategoryService;

    public function __construct(ApiSettingService $apiSettingService,
                                ApiPhotoService $apiPhotoService,
                                CommonCategoryService $commonCategoryService)
    {
        $this->apiSettingService = $apiSettingService;
        $this->apiPhotoService = $apiPhotoService;
        $this->commonCategoryService = $commonCategoryService;
    }

    /**
     * @OA\GET(
     *     path="/v1/config",
     *     tags={"Config"},
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function config(): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess([
                'setting' => $this->apiSettingService->first(),
                'logo' => $this->apiPhotoService->findByType('logo'),
                'category_list' => $this->commonCategoryService->getListMenu(['multi' => 1, 'active_menu' => []])
            ]);
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

}
