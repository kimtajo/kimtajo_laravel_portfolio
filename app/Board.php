<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Board
 *
 * @mixin \Eloquent
 */
class Board extends Model
{
    //
	protected $fillable = ['board_name', 'title', 'content', 'visited_at'];

}
