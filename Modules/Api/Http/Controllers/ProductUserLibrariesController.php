<?php

namespace Modules\Api\Http\Controllers;

use App\Helpers\Helpers;
use App\Helpers\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Services\Api\ApiProductUserLibraryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Api\Http\Requests\ProductUserLibrary\CreateRequest;

class ProductUserLibrariesController extends Controller
{
    private $apiProductUserLibraryService;

    public function __construct(ApiProductUserLibraryService $apiProductUserLibraryService)
    {
        $this->apiProductUserLibraryService = $apiProductUserLibraryService;
    }

    /**
     * @OA\GET(
     *     path="/v1/product-user-libraries",
     *     tags={"ProductUserLibrary"},
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
            return ResponseHelpers::responseSuccess($this->apiProductUserLibraryService->apiGetAll($request->all()));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\GET(
     *     path="/v1/product-user-libraries/list",
     *     tags={"ProductUserLibrary"},
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function indexList(Request $request): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess($this->apiProductUserLibraryService->apiGetAllList());
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\POST(
     *     path="/v1/product-user-libraries",
     *     tags={"ProductUserLibrary"},
     *     @OA\Parameter(
     *        name="user_id", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="product_id", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="product_chapter_id", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *        name="deviceId", in="query", required=false, @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function create(CreateRequest $request): JsonResponse
    {
        try {
            return ResponseHelpers::responseSuccess($this->apiProductUserLibraryService->create($request->validated()));
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

    /**
     * @OA\DELETE(
     *     path="/v1/product-user-libraries/:id",
     *     tags={"ProductUserLibrary"},
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        try {
            $this->apiProductUserLibraryService->delete($id);
            return ResponseHelpers::responseSuccess();
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }

}
