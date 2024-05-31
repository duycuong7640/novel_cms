<?php

namespace Modules\Api\Http\Controllers;

use App\Helpers\Helpers;
use App\Helpers\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Services\Api\ApiProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $apiProductService;

    public function __construct(ApiProductService $apiProductService)
    {
        $this->apiProductService = $apiProductService;
    }

    /**
     * @OA\GET(
     *     path="/v1/products",
     *     tags={"Product"},
     *     @OA\Parameter(
     *        name="title", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="category_id", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="isLatestChapters", in="query", required=false, @OA\Schema(type="boolean")
     *     ),
     *     @OA\Parameter(
     *        name="paginate", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="limit", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="type", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="orderField", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="orderType", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess($this->apiProductService->apiGetAll($request->all()));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\GET(
     *     path="/v1/products/search",
     *     tags={"Product"},
     *     @OA\Parameter(
     *        name="keyword", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="paginate", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="limit", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="orderField", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="orderType", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess($this->apiProductService->apiGetAllSearch($request->all()));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\GET(
     *     path="/v1/products/:slug",
     *     tags={"Product"},
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function show($slug): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess($this->apiProductService->apiGetDetail($slug));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\GET(
     *     path="/v1/products/new-top",
     *     tags={"Product"},
     *     @OA\Parameter(
     *        name="isCategory", in="query", required=false, @OA\Schema(type="boolean")
     *     ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function newTop(Request $request): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess($this->apiProductService->apiGetNewTop($request->all()));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\GET(
     *     path="/v1/products/sitebar-right-novel",
     *     tags={"Product"},
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function sitebarRightNovel(Request $request): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess($this->apiProductService->apiGetSitebarRightNovel($request->all()));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

}
