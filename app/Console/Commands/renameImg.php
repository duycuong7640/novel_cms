<?php

namespace App\Console\Commands;

use App\Helpers\Helpers;
use App\Models\Product;
use Illuminate\Console\Command;
use Mockery\Exception;

class renameImg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renameImg';

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
//        $products = Product::where('thumbnail', 'like', '%\"%')->get();
////        $products = Product::where('slug', 'im-the-city-lord-of-the-last-days')->get();
//        foreach ($products as $row) {
//            try {
//                $imageUrl = 'http://novelcms:8888/storage/photos/'.$row->thumbnail;
//                $savePathJpg = public_path('storage/photos/novels/' . $row->slug . '.jpg');
//
//                if ($this->downloadImage($imageUrl, $savePathJpg)) {
//                    $row->update(['thumbnail' => 'novels/' . $row->slug . '.jpg']);
//                }
//            } catch (Exception $ex) {
//                echo $ex->getMessage();
//            }
//        }
    }

    public function urlExists($url)
    {
        $headers = @get_headers($url);
        return $headers && strpos($headers[0], '200');
    }

    public function downloadImage($imageUrl, $savePathJpg)
    {
        try {
            // Tải nội dung của hình ảnh từ URL
            $imageContent = @file_get_contents($imageUrl);
            if ($imageContent === false) {
//            die('Không thể tải hình ảnh từ URL: ' . $imageUrl);
            }

            // Lưu nội dung hình ảnh vào tệp tạm thời
            $tempPath = 'temp_image';
            @file_put_contents($tempPath, $imageContent);

            // Mở hình ảnh từ tệp tạm thời
            $image = @imagecreatefromstring($imageContent);
            if ($image === false) {
                unlink($tempPath);
//            die('Không thể tạo hình ảnh từ nội dung tải xuống.');
            }

            // Tạo thư mục lưu hình ảnh nếu chưa tồn tại
            if (!is_dir(dirname($savePathJpg))) {
                mkdir(dirname($savePathJpg), 0777, true);
            }

            // Lưu hình ảnh dưới định dạng .jpg
            if (!@imagejpeg($image, $savePathJpg)) {
                unlink($tempPath);
                @imagedestroy($image);
//            die('Không thể lưu hình ảnh dưới định dạng .jpg.');
            }

            // Xóa tệp tạm thời và giải phóng bộ nhớ
            unlink($tempPath);
            @imagedestroy($image);

            echo '-/ ';
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}
