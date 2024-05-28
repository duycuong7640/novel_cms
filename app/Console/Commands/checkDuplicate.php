<?php

namespace App\Console\Commands;

use App\Helpers\Helpers;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class checkDuplicate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkDuplicate';

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
        $results = DB::table('product_chapters')
            ->select('title', DB::raw('COUNT(*) as count'))
            ->groupBy('title')
            ->having(DB::raw('COUNT(*)'), '>', 1)
            ->limit(10)
            ->get();
        Helpers::pre($results);
    }
}
