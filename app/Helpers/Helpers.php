<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
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

    public static function renderExampleSEO($title)
    {
        $arr = [
            [
                'title' => 'Read ' . $title . ' Online for Free',
                'description' => 'Enjoy reading ' . $title . ' RAW English translated novels for free. Dive into the latest fantasy chapters and join our community of avid readers!',
            ],
            [
                'title' => 'Explore ' . $title . ' - Free Online Novel',
                'description' => 'Discover ' . $title . ' with free RAW English translations. Follow the exciting updates and connect with fellow novel lovers!',
            ],
            [
                'title' => 'Read RAW ' . $title . ' - Free English Translation',
                'description' => 'Read the thrilling ' . $title . ' RAW novel in English for free. Stay updated with the newest chapters and become part of our reader community!',
            ],
            [
                'title' => 'Discover ' . $title . ' - Free Online Novel Official',
                'description' => 'Access ' . $title . ' in RAW English translation for free at DicNovel. Explore the latest adventures and engage with our vibrant reader community!',
            ],
            [
                'title' => 'Discover the Adventure of ' . $title . ' | Read Free on DicNovel',
                'description' => 'Join the journey of ' . $title . '. Read the latest RAW English translations for free. Explore thrilling chapters and connect with fellow novel enthusiasts!',
            ],
            [
                'title' => 'Unveil ' . $title . ' - Free RAW Novel Online',
                'description' => 'Experience the excitement of ' . $title . '. Read free RAW English translated chapters. Stay updated with the newest adventures and join our reading community!',
            ],
            [
                'title' => 'Journey with ' . $title . ' - Free Online Reads',
                'description' => 'Delve into ' . $title . '. Enjoy free RAW English translations and keep up with the latest chapters of this captivating story. Join our vibrant community of readers!',
            ],
            [
                'title' => 'Read the Epic Tale of ' . $title . ' - Free RAW Novel',
                'description' => 'Follow ' . $title . ' in RAW English for free. Discover the latest chapters and become a part of our community of passionate novel lovers!',
            ],
            [
                'title' => 'Explore ' . $title . ' - Free Novel Updates',
                'description' => 'Discover the epic saga of ' . $title . '. Read free RAW English translations and stay updated with new chapters. Join our community and dive into the adventure!',
            ],
            [
                'title' => 'Follow ' . $title . ' - Free Online Reading',
                'description' => 'Immerse yourself in ' . $title . '. Access free RAW English translations and follow the latest chapters. Join our reading community today!',
            ],
            [
                'title' => $title . ' - Free RAW Novel Updates',
                'description' => 'Stay updated with ' . $title . '. Read the latest RAW English translations for free. Connect with fellow fans and explore new chapters.',
            ],
            [
                'title' => 'Discover ' . $title . ' - Free English Translation',
                'description' => 'Explore the adventures of ' . $title . '. Read free RAW English translations and enjoy the newest chapters. Join our passionate community of readers.',
            ],
            [
                'title' => 'Read ' . $title . ' - Latest Chapters Free',
                'description' => 'Enjoy ' . $title . ' in RAW English. Access free translations and follow the newest updates. Become part of our reader community!',
            ],
            [
                'title' => 'Explore ' . $title . ' - Free Online Novel',
                'description' => 'Discover the thrilling story of ' . $title . '. Read free RAW English translations and stay up-to-date with the latest chapters. Join our community of novel enthusiasts!',
            ],
            //
            [
                'title' => 'Read ' . $title . ' Online for Free',
                'description' => 'Enjoy reading ' . $title . ' RAW English translated novels for free. Dive into the latest fantasy chapters and join our community of avid readers!',
            ],
            [
                'title' => 'Explore ' . $title . ' - Free Online Novel',
                'description' => 'Discover ' . $title . ' with free RAW English translations. Follow the exciting updates and connect with fellow novel lovers!',
            ],
            [
                'title' => 'Read RAW ' . $title . ' - Free English Translation',
                'description' => 'Read the thrilling ' . $title . ' RAW novel in English for free. Stay updated with the newest chapters and become part of our reader community!',
            ],
            [
                'title' => 'Discover ' . $title . ' - Free Online Novel Official',
                'description' => 'Access ' . $title . ' in RAW English translation for free at DicNovel. Explore the latest adventures and engage with our vibrant reader community!',
            ],
            [
                'title' => 'Discover the Adventure of ' . $title . ' | Read Free on DicNovel',
                'description' => 'Join the journey of ' . $title . '. Read the latest RAW English translations for free. Explore thrilling chapters and connect with fellow novel enthusiasts!',
            ],
            [
                'title' => 'Unveil ' . $title . ' - Free RAW Novel Online',
                'description' => 'Experience the excitement of ' . $title . '. Read free RAW English translated chapters. Stay updated with the newest adventures and join our reading community!',
            ],
            [
                'title' => 'Journey with ' . $title . ' - Free Online Reads',
                'description' => 'Delve into ' . $title . '. Enjoy free RAW English translations and keep up with the latest chapters of this captivating story. Join our vibrant community of readers!',
            ],
            [
                'title' => 'Read the Epic Tale of ' . $title . ' - Free RAW Novel',
                'description' => 'Follow ' . $title . ' in RAW English for free. Discover the latest chapters and become a part of our community of passionate novel lovers!',
            ],
            [
                'title' => 'Explore ' . $title . ' - Free Novel Updates',
                'description' => 'Discover the epic saga of ' . $title . '. Read free RAW English translations and stay updated with new chapters. Join our community and dive into the adventure!',
            ],
            [
                'title' => 'Follow ' . $title . ' - Free Online Reading',
                'description' => 'Immerse yourself in ' . $title . '. Access free RAW English translations and follow the latest chapters. Join our reading community today!',
            ],
            [
                'title' => $title . ' - Free RAW Novel Updates',
                'description' => 'Stay updated with ' . $title . '. Read the latest RAW English translations for free. Connect with fellow fans and explore new chapters.',
            ],
            [
                'title' => 'Discover ' . $title . ' - Free English Translation',
                'description' => 'Explore the adventures of ' . $title . '. Read free RAW English translations and enjoy the newest chapters. Join our passionate community of readers.',
            ],
            [
                'title' => 'Read ' . $title . ' - Latest Chapters Free',
                'description' => 'Enjoy ' . $title . ' in RAW English. Access free translations and follow the newest updates. Become part of our reader community!',
            ],
            [
                'title' => 'Explore ' . $title . ' - Free Online Novel',
                'description' => 'Discover the thrilling story of ' . $title . '. Read free RAW English translations and stay up-to-date with the latest chapters. Join our community of novel enthusiasts!',
            ],
            //
            [
                'title' => 'Read ' . $title . ' Online for Free',
                'description' => 'Enjoy reading ' . $title . ' RAW English translated novels for free. Dive into the latest fantasy chapters and join our community of avid readers!',
            ],
            [
                'title' => 'Explore ' . $title . ' - Free Online Novel',
                'description' => 'Discover ' . $title . ' with free RAW English translations. Follow the exciting updates and connect with fellow novel lovers!',
            ],
            [
                'title' => 'Read RAW ' . $title . ' - Free English Translation',
                'description' => 'Read the thrilling ' . $title . ' RAW novel in English for free. Stay updated with the newest chapters and become part of our reader community!',
            ],
            [
                'title' => 'Discover ' . $title . ' - Free Online Novel Official',
                'description' => 'Access ' . $title . ' in RAW English translation for free at DicNovel. Explore the latest adventures and engage with our vibrant reader community!',
            ],
            [
                'title' => 'Discover the Adventure of ' . $title . ' | Read Free on DicNovel',
                'description' => 'Join the journey of ' . $title . '. Read the latest RAW English translations for free. Explore thrilling chapters and connect with fellow novel enthusiasts!',
            ],
            [
                'title' => 'Unveil ' . $title . ' - Free RAW Novel Online',
                'description' => 'Experience the excitement of ' . $title . '. Read free RAW English translated chapters. Stay updated with the newest adventures and join our reading community!',
            ],
            [
                'title' => 'Journey with ' . $title . ' - Free Online Reads',
                'description' => 'Delve into ' . $title . '. Enjoy free RAW English translations and keep up with the latest chapters of this captivating story. Join our vibrant community of readers!',
            ],
            [
                'title' => 'Read the Epic Tale of ' . $title . ' - Free RAW Novel',
                'description' => 'Follow ' . $title . ' in RAW English for free. Discover the latest chapters and become a part of our community of passionate novel lovers!',
            ],
            [
                'title' => 'Explore ' . $title . ' - Free Novel Updates',
                'description' => 'Discover the epic saga of ' . $title . '. Read free RAW English translations and stay updated with new chapters. Join our community and dive into the adventure!',
            ],
            [
                'title' => 'Follow ' . $title . ' - Free Online Reading',
                'description' => 'Immerse yourself in ' . $title . '. Access free RAW English translations and follow the latest chapters. Join our reading community today!',
            ],
            [
                'title' => $title . ' - Free RAW Novel Updates',
                'description' => 'Stay updated with ' . $title . '. Read the latest RAW English translations for free. Connect with fellow fans and explore new chapters.',
            ],
            [
                'title' => 'Discover ' . $title . ' - Free English Translation',
                'description' => 'Explore the adventures of ' . $title . '. Read free RAW English translations and enjoy the newest chapters. Join our passionate community of readers.',
            ],
            [
                'title' => 'Read ' . $title . ' - Latest Chapters Free',
                'description' => 'Enjoy ' . $title . ' in RAW English. Access free translations and follow the newest updates. Become part of our reader community!',
            ],
            [
                'title' => 'Explore ' . $title . ' - Free Online Novel',
                'description' => 'Discover the thrilling story of ' . $title . '. Read free RAW English translations and stay up-to-date with the latest chapters. Join our community of novel enthusiasts!',
            ]
        ];

        return $arr[array_rand($arr)];
    }

    public static function replaceSpecial($text)
    {
        $text = str_replace('DivNovel', 'DicNovel', $text);
//        $pattern = '/[^a-z0-9"“\'!’ ]+/i';
//        $clean_string = preg_replace($pattern, '', $text);
        return $text;
    }

    public static function renderLinkRead($product_slug, $chap)
    {
        $slug = self::renderSlug(self::removePrefix($chap->title));
        $chap_slug = !empty($slug) ? $slug : 'chapter-' . $chap->rank;
        return env('COMMON_URL') . $product_slug . '/chapter/' . $chap_slug . '-' . $chap->id;
    }

    public static function removePrefix($text)
    {
        $pattern = '/^.*(?=Chapter)/';
        $text = str_replace("'", "\'", $text);
        $text = @preg_replace($pattern, '', $text);
        if (@strlen($text) > 5) {
//            $patternSpecialChars = '/[~。\]\[\(\)]/';
//            $text = @preg_replace($patternSpecialChars, '', $text);
            $text = str_replace(['~', '。', '[', ']', '(', ')'], '', $text);
        }
        return $text;
    }

    public static function renderSlug($title)
    {
        return Str::slug($title, '-');
    }

}
