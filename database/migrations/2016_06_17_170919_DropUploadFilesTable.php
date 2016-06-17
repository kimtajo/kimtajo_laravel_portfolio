<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUploadFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::drop('upload_files');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('upload_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('board_id');
            $table->string('file_location');
            $table->string('file_name');
            $table->timestamps();
        });
    }
}
