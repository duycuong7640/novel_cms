<?php

namespace App\Helpers;

class ApiFormatDataHelpers
{
    public static function formatList($_data, $type, $thumb = true)
    {
        foreach ($_data as $k => $row) {
            $_data[$k] = self::format($row, $type, $thumb);
        }

        return $_data;
    }

    public static function format($row, $type, $thumb = true)
    {
        if (empty($row)) return $row;
        $thumb_url = '';
        $storage_url = 'storage/photos';
        switch ($type) {
            case \dataKey::USER:
                $thumb_url = \ApiThumb::USER;
                $row->thumbnail = !empty($row->thumbnail) ? env('DOMAIN_IMG') . env('IMAGE_IMG') . $row->thumbnail : '';
                break;
            case \dataKey::PRODUCT:
                foreach (\apiDataFFormat::PRODUCT as $r) {
                    unset($row->$r);
                }
                $thumb_url = \ApiThumb::PRODUCT;
                $row->thumbnail = !empty($row->thumbnail) ? env('DOMAIN_IMG') . env('IMAGE_IMG') . $row->thumbnail : '';
                break;
            case \dataKey::PHOTO:
                $thumb_url = \ApiThumb::PHOTO;
                $row->thumbnail = !empty($row->thumbnail) ? env('DOMAIN_IMG') . env('IMAGE_IMG') . $row->thumbnail : '';
                break;
            default:
                break;
        }

        if ($thumb_url && $thumb && !empty($row->thumbnail)) $row->thumbnail = str_replace($storage_url, 'img/' . $thumb_url, $row->thumbnail);

        return $row;
    }

}
