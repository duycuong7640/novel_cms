<?php

namespace App\Console\Commands;

use App\Helpers\Helpers;
use App\Models\Product;
use Illuminate\Console\Command;

class updateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateData';

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
        $products = Product::whereNotNull('content')->get();
        foreach ($products as $row) {
            $content = Helpers::replaceSpecial($row->content);
            Product::where('id', $row->id)->update(['content' => $content]);
        }
    }


}
