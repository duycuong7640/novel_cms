<?php

namespace App\Console\Commands;

use App\Models\ProductChapter;
use Carbon\Carbon;
use Illuminate\Console\Command;

class updateDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateDate';

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
        $currentTimestamp = Carbon::now();
        ProductChapter::query()->update(['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]);
    }
}
