<?php

namespace Modules\Api\Http\Controllers;

use App\Helpers\ApiFormatDataHelpers;
use App\Helpers\Helpers;
use App\Helpers\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Services\Api\ApiCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $apiCategoryService;

    public function __construct(ApiCategoryService $apiCategoryService)
    {
        $this->apiCategoryService = $apiCategoryService;
    }

    /**
     * @OA\GET(
     *     path="/v1/categories",
     *     tags={"Category"},
     *     @OA\Parameter(
     *        name="title", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="type", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="limit", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="orderField", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $categories = $this->apiCategoryService->apiGetAll($request->all());
            $result = [];
            foreach ($categories as $row) {
                $result['ids'][$row->id] = $row;
                if (is_null($row->parent_id)) {
                    $result['menu'][$row->id] = $row->toArray();
                    $result['menu'][$row->id]['children'] = [];
                } else {
                    $result['menu'][$row->parent_id]['children'][] = $row->toArray();
                }
            }

            return ResponseHelpers::responseSuccess($result);
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\GET(
     *     path="/v1/categories/:id",
     *     tags={"Category"},
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function show($_slug): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess($this->apiCategoryService->findBySlug($_slug));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

}
