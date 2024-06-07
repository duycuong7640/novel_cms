<?php

namespace App\Services\Api;

use App\Helpers\Helpers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductChapter;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;

class ApiSitemapService
{
    private $categoryRepository;
    private $productRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function sitemap()
    {
        echo '222';
        $timeRun = $this->convertTime(date('Y-m-d H:i:s'));
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Category
        $categories = Category::select('id', 'title', 'slug', 'created_at', 'updated_at')->where('type', '!=', 'home')->get();
        $xmlCategory = $this->sitemapFolder($categories, 'category');

        $sitemap .= '<sitemap>';
        $sitemap .= '<loc>' . $xmlCategory . '</loc>';
        $sitemap .= '<lastmod>' . $timeRun . '</lastmod>';
        $sitemap .= '</sitemap>';

        // Product
        $products = Product::select('id', 'category_id', 'title', 'slug', 'created_at', 'updated_at')->where('is_crawler_chapter', true)->paginate(500, ['*'], 'page', 1);
        for ($i = 1; $i <= $products->lastPage(); $i++) {
            if ($i == 1) {
                $xmlProduct = $this->sitemapFolder($products, 'product', $i);
            } else {
                $products = Product::where('is_crawler_chapter', true)->paginate(500, ['*'], 'page', $i);
                $xmlProduct = $this->sitemapFolder($products, 'product', $i);
            }

            $sitemap .= '<sitemap>';
            $sitemap .= '<loc>' . $xmlProduct . '</loc>';
            $sitemap .= '<lastmod>' . $timeRun . '</lastmod>';
            $sitemap .= '</sitemap>';
        }

        // Product chapter
        $productChapters = ProductChapter::select('id', 'product_id', 'title', 'rank', 'created_at', 'updated_at')->whereNotNull('content')->paginate(1000, ['*'], 'page', 1);
        for ($i = 1; $i <= $productChapters->lastPage(); $i++) {
            if ($i == 1) {
                $xmlProduct = $this->sitemapFolder($productChapters, 'productChapter', $i);
            } else {
                $productChapters = ProductChapter::select('id', 'product_id', 'title', 'rank', 'created_at', 'updated_at')->whereNotNull('content')->paginate(1000, ['*'], 'page', $i);
                $xmlProduct = $this->sitemapFolder($productChapters, 'productChapter', $i);
            }
            echo "--".$i;

            $sitemap .= '<sitemap>';
            $sitemap .= '<loc>' . $xmlProduct . '</loc>';
            $sitemap .= '<lastmod>' . $timeRun . '</lastmod>';
            $sitemap .= '</sitemap>';
            if($i == 50) break;
        }

        $sitemap .= '</sitemapindex>';

        @file_put_contents(public_path('sitemap.xml'), $sitemap);
    }

    public function sitemapFolder($data, $type, $page = 0)
    {
        try {
            $priority = '0.8';
            $file = '';
            $savePath = '';
            $flag = false;
            $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
            $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            foreach ($data as $row) {
                $flag = true;
                $url = '';
                switch ($type) {
                    case 'category':
                        $url = env('COMMON_URL') . $row->slug;
                        $file = 'category';
                        $savePath = public_path('sitemaps/' . $file . '.xml');
                        break;
                    case 'product':
                        $priority = '1';
                        if (empty($row->category)) {
                            $flag = false;
                        } else {
                            $category = $row->category;
                            $url = env('COMMON_URL') . $category->slug . '/' . $row->slug;
                            $file = 'page' . $page . '-list-novels';
                            $savePath = public_path('sitemaps/' . $file . '.xml');
                        }
                        break;
                    case 'productChapter':
                        $priority = '1';
                        if (empty($row->product)) {
                            $flag = false;
                        } else {
                            $product = $row->product;
                            $url = \App\Helpers\Helpers::renderLinkRead($product->slug, $row);
                            $file = 'page' . $page . '-list-chapters';
                            $savePath = public_path('sitemaps/' . $file . '.xml');
                        }
                        break;
                    default:
                        break;
                }

                if ($flag) {
                    if ($row->updated_at) {
                        $updated_at = $this->convertTime($row->updated_at);
                    } else if ($row->created_at) {
                        $updated_at = $this->convertTime($row->created_at);
                    } else {
                        $updated_at = $this->convertTime(date('Y-m-d H:i:s'));
                    }

                    $sitemap .= '<url>';
                    $sitemap .= '<loc>' . $url . '</loc>';
                    $sitemap .= '<lastmod>' . $updated_at . '</lastmod>';
                    $sitemap .= '<changefreq>daily</changefreq>';
                    $sitemap .= '<priority>' . $priority . '</priority>';
                    $sitemap .= '</url>';
                }
            }
            $sitemap .= '</urlset>';

            @file_put_contents($savePath, $sitemap);
            return env('COMMON_URL') . 'sitemaps/' . $file . '.xml';

        } catch (\Exception $ex) {
            Helpers::pre($ex->getMessage());
        }
    }

    public function convertTime($dateTime)
    {
        $dateTime = '2024-06-06 16:06:21';
        $date = new \DateTime($dateTime);
        $timezone = new \DateTimeZone('America/New_York');
        $date->setTimezone($timezone);
        $iso_format = $date->format('c');
        return $iso_format;
    }
}
