<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('mine_url'))
{
   function mine_url($str)
   {
    $str = str_replace('ქ','q', $str);
    $str = str_replace('წ','ts', $str);
    $str = str_replace('ჭ','ch', $str);
    $str = str_replace('ე','e', $str);
    $str = str_replace('რ','r', $str);
    $str = str_replace('ღ','gh', $str);
    $str = str_replace('ტ','t', $str);
    $str = str_replace('თ','t', $str);
    $str = str_replace('ყ','y', $str);
    $str = str_replace('უ','u', $str);
    $str = str_replace('ი','i', $str);
    $str = str_replace('ო','o', $str);
    $str = str_replace('პ','p', $str);
    $str = str_replace('ა','a', $str);
    $str = str_replace('ს','s', $str);
    $str = str_replace('შ','sh', $str);
    $str = str_replace('ფ','f', $str);
    $str = str_replace('გ','g', $str);
    $str = str_replace('ჰ','h', $str);
    $str = str_replace('ჯ','j', $str);
    $str = str_replace('ჟ','zh', $str);
    $str = str_replace('კ','k', $str);
    $str = str_replace('ლ','l', $str);
    $str = str_replace('ზ','z', $str);
    $str = str_replace('ძ','dz', $str);
    $str = str_replace('ხ','kh', $str);
    $str = str_replace('ც','c', $str);
    $str = str_replace('ჩ','ch', $str);
    $str = str_replace('ვ','v', $str);
    $str = str_replace('ბ','b', $str);
    $str = str_replace('ნ','n', $str);
    $str = str_replace('მ','m', $str);
    $str = str_replace('დ','d', $str);

      return $str;
   }
} 