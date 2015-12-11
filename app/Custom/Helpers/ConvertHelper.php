<?php
namespace App\Custom\Helpers;

class ConvertHelper{
    public static function alias($name) {
        $alias = $name;
        $alias = trim(mb_strtolower($alias, 'utf8'));
        $alias = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $alias);

        $alias = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $alias);

        $alias = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $alias);
        $alias = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $alias);

        $alias = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $alias);
        $alias = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $alias);
        $alias = preg_replace('/(đ)/', 'd', $alias);
        $alias = preg_replace('/[^a-z0-9-\s\.]/', '', $alias);
        $alias = preg_replace('/([\s]+)|(\.)/', '-', $alias);

        return $alias;
    }
}