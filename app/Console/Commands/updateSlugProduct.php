<?php

namespace App\Console\Commands;

use App\Models\ProductChapter;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class updateSlugProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateSlugProduct';

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
        for($i = 0; $i<=100; $i++) {
            $productChapters = ProductChapter::where('slug', 'like', '%!%')->limit(1000)->get();
            echo count($productChapters) . '-';
            foreach ($productChapters as $row) {
                ProductChapter::where('id', $row->id)->update(['slug' => Str::slug($row->title)]);
            }
        }
    }
}
