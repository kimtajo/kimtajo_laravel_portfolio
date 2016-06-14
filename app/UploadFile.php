<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    //
	protected $table = 'upload_files';
	protected $fillable = ['board_id', 'file_location', 'file_name'];
}
