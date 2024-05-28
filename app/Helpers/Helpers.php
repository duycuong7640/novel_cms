<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;

class Helpers
{
    public static function pre($data = array())
    {
        echo '<pre>';
        print_r($data);
        die;
    }

    public static function shortDesc($str, $len, $charset = 'UTF-8')
    {
        $str = strip_tags($str);
        $str = html_entity_decode($str, ENT_QUOTES, $charset);
        if (mb_strlen($str, $charset) > $len) {
            $arr = explode(' ', $str);
            $str = mb_substr($str, 0, $len, $charset);
            $arrRes = explode(' ', $str);
            $last = $arr[count($arrRes) - 1];
            unset($arr);
            if (strcasecmp($arrRes[count($arrRes) - 1], $last)) {
                unset($arrRes[count($arrRes) - 1]);
            }
            return implode(' ', $arrRes) . "...";
        }
        return $str;
    }

    public static function titleAction($data)
    {
        return array(
            'title' => !empty($data[0]) ? $data[0] : '',
            'flag' => !empty($data[1]) ? $data[1] : '',
        );
    }

    public static function renderSTT($key, $data)
    {
        $start = ($data->currentPage() - 1) * $data->perPage();
        return $start + $key;
    }

    public static function renderStatus($status = 1)
    {
        $arr = ['Non-Active', 'Active'];
        return !empty($arr[$status]) ? $arr[$status] : 'Empty';
    }

    public static function formatDate($date = '')
    {
        $plusTime = 0;
        if (App::getLocale() == 'vi') {
            $plusTime = (7 * 60 * 60);
            return date('d/m/Y', (strtotime($date) + $plusTime));
        } else {
            return date('d/m/Y', (strtotime($date) + $plusTime));
        }
    }

    public static function buildUUID()
    {
        return Uuid::uuid4()->toString();
    }

    public static function metaHead($data)
    {
        return array(
            'title_seo' => !empty($data["title_seo"]) ? $data["title_seo"] : (!empty($data["name"]) ? $data["name"] : (!empty($data["title"]) ? $data["title"] : '')),
            'meta_key' => !empty($data["meta_key"]) ? $data["meta_key"] : '',
            'meta_des' => !empty($data["meta_des"]) ? $data["meta_des"] : ''
        );
    }

    public static function imageThumbnail($image = '')
    {
        if (empty($image)) return '';
        $image = explode('storage/photos/', $image);
        if (!empty($image[count($image) - 1])) return $image[count($image) - 1]; else return '';
    }

    public static function paramsInjection($data)
    {
        foreach ($data as $k => $row) {
            $data[$k] = !is_string($row) ? $row : addslashes($row);
        }
        return $data;
    }

}
