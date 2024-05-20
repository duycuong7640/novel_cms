<?php
namespace App\Services\System;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class FileUploadService
{
    public function uploadImg($_file,$_folder = '')
    {
        try{
            $fileName = Str::random(5).'_'.$_file->getClientOriginalName();
            Storage::disk('uploads')->putFileAs($_folder, $_file, $fileName);
            return $_folder.'/'.$fileName;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}
