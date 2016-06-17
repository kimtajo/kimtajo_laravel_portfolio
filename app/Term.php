<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    //
	protected $fillable = ['board_id', 'start_date', 'end_date'];
}
