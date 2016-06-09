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

}