<?php

namespace App\Helpers;

class FormatDataHelpers
{
    public static function formatListAdmin($_data, $type, $thumb = true)
    {
        foreach ($_data as $k => $row) {
            $_data[$k] = self::format($row, $type, 'admin', $thumb);
        }

        return $_data;
    }

    public static function format($row, $type, $position, $thumb = true)
    {
        if (empty($row)) return $row;
        $thumb_url = '';
        $storage_url = 'storage/photos';
        $row->thumbnail_root = $row->thumbnail;
        switch ($type) {
            case \dataKey::CATEGORY:
                $row->thumbnail = asset(env('IMAGE_IMG') . $row->thumbnail);
                break;
            case \dataKey::POST:
                $thumb_url = \adminTimThumb::ADMIN['POST'];
                $row->thumbnail = asset(env('IMAGE_IMG') . $row->thumbnail);
                break;
            case \dataKey::PRODUCT:
                $thumb_url = \adminTimThumb::ADMIN['PRODUCT'];
                $row->thumbnail = env('DOMAIN_IMG') . env('IMAGE_IMG') . $row->thumbnail;
                break;
            case \dataKey::LOGO:
                $thumb_url = \adminTimThumb::ADMIN['LOGO'];
                $row->thumbnail2_root = $row->thumbnail2;
                $row->thumbnail2 = env('DOMAIN_IMG') . env('IMAGE_IMG') . $row->thumbnail2;
                $row->thumbnail = env('DOMAIN_IMG') . env('IMAGE_IMG') . $row->thumbnail;
                break;
            default:
                break;
        }

        if ($thumb_url && $thumb) $row->thumbnail = str_replace($storage_url, 'img/' . $thumb_url, $row->thumbnail);

        return $row;
    }

    public static function formatListClient($_data, $type, $thumb = true)
    {
        foreach ($_data as $k => $row) {
            $_data[$k] = self::format($row, $type, $thumb);
        }

        return $_data;
    }

    public static function formatClient($row, $type, $thumb = true)
    {
        if (empty($row)) return $row;
        $thumb_url = '';
        $storage_url = 'storage/photos';
        $row->thumbnail_root = $row->thumbnail;
        switch ($type) {
            case \dataKey::CATEGORY:
                $row->thumbnail = asset(env('IMAGE_IMG') . $row->thumbnail);
                break;
            case \dataKey::POST:
                $thumb_url = \clientTimThumb::CLIENT['POST'];
                $row->thumbnail = asset(env('IMAGE_IMG') . $row->thumbnail);
                break;
            case \dataKey::LOGO:
                $thumb_url = \clientTimThumb::CLIENT['LOGO'];
                $row->thumbnail = asset(env('IMAGE_IMG') . $row->thumbnail);
                $row->thumbnail2 = asset(env('IMAGE_IMG') . $row->thumbnail2);
                break;
            default:
                break;
        }

        if ($thumb_url && $thumb) $row->thumbnail = str_replace($storage_url, 'img/' . $thumb_url, $row->thumbnail);

        return $row;
    }

}
