<?php

namespace Modules\Api\Http\Controllers;

use App\Helpers\Helpers;
use App\Helpers\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Services\Api\ApiProductChapterService;
use App\Services\Api\ApiProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductChaptersController extends Controller
{
    private $apiProductChapterService;

    public function __construct(ApiProductChapterService $apiProductChapterService)
    {
        $this->apiProductChapterService = $apiProductChapterService;
    }

    /**
     * @OA\GET(
     *     path="/v1/product-chapters/:id",
     *     tags={"Product"},
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess($this->apiProductChapterService->apiGetDetail($id));
        } catch (\Exception $e) {Helpers::pre($e->getMessage());
            return ResponseHelpers::responseServerError();
        }
    }
}
