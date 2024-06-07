<?php

namespace Modules\Api\Http\Controllers;

use App\Helpers\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Services\Api\ApiSitemapService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SitemapGenerateController extends Controller
{
    private $apiSitemapService;

    public function __construct(ApiSitemapService $apiSitemapService)
    {
        $this->apiSitemapService = $apiSitemapService;
    }

    public function sitemap(Request $request): JsonResponse
    {
        try {
            $this->apiSitemapService->sitemap();
            return ResponseHelpers::responseSuccess();
        } catch (\Exception $e) {
            return ResponseHelpers::responseServerError();
        }
    }
}
