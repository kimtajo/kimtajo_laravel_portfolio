<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    //
	use SoftDeletes;
	protected $fillable = ['board_id', 'start_date', 'end_date'];
	protected $dates = ['deleted_at'];
	public static $rules = [
		'start_date'=>'date',
		'end_date'=>'date'
	];
	
	public function boards(){
		return $this->belongsTo('App\Board');
	}

}
