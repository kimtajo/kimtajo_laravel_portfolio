<?php
/**
 * Created by PhpStorm.
 * User: Hellomath
 * Date: 2016. 6. 9.
 * Time: 오후 4:11
 */

namespace App\Helpers;


class TajoHelpers{
	public static function setActive($path, $active = 'active'){
		return call_user_func_array('Request::is', (array)$path)?$active:'';
	}
	public static function compareCollection($arr1, $arr2, $type = 'insert'){
		$col1 = collect($arr1);
		$col2 = collect($arr2);

		if($type == 'insert')
			$filtered = $col1->diff($arr2);
		else if($type == 'delete')
			$filtered = $col2->diff($arr1);

		return $filtered;

	}

	public static function cutMessage($message, $length = 50, $charset = 'UTF-8'){
		if(mb_strlen($message, $charset) > $length)
			return mb_substr($message, 0, $length, $charset)."...";
		else
			return $message;
	}
	
	public static function removeImage($string){
		return preg_replace("/<img[^>]*src=[\'\"]?([^>\'\"]+)[\'\"]?[^>]*>/", "", $string);
	}


}