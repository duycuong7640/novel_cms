<?php

namespace App\Console\Commands;

use App\Helpers\ResponseHelpers;
use App\Services\Api\ApiSitemapService;
use Illuminate\Console\Command;

class renderSitemap extends Command
{
    private $apiSitemapService;

    public function __construct(ApiSitemapService $apiSitemapService)
    {
        parent::__construct();
        $this->apiSitemapService = $apiSitemapService;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renderSitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->apiSitemapService->sitemap();
            echo 'Done';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
