<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Board
 *
 * @mixin \Eloquent
 */
class Board extends Model
{
    //
	use SoftDeletes;
	protected $fillable = ['board_name', 'title', 'content', 'visited_at'];
	protected $primaryKey = 'board_id';
	protected $dates = ['deleted_at'];
	public static $rules = [
		'title'=>'required',
		'content'=>'required'
	];


	public function terms(){
		return $this->hasMany('App\Term', 'board_id', 'board_id');
	}

	public function tags(){
		return $this->hasMany('App\Tag', 'board_id', 'board_id');
	}
}
