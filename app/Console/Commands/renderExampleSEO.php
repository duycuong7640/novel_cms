<?php

namespace App\Console\Commands;

use App\Helpers\Helpers;
use App\Models\Product;
use Illuminate\Console\Command;

class renderExampleSEO extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renderExampleSEO';

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
//        $products = Product::whereNull('title_seo')->where('id', 444705252092940288)->get();
//        $products = Product::whereNull('title_seo')->get();
//        $products = Product::get();
//        foreach ($products as $row) {
//            $example = Helpers::renderExampleSEO($row->title);
//            Product::where('id', $row->id)->update(['title_seo' => $example['title'], 'meta_des' => $example['description']]);
//        }
    }
}
