<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedFilesTable extends Migration
{
    public function up()
    {
        Schema::create('verified_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id')->references('id')->on('files');
            $table->unsignedBigInteger('verified_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('verified_files');
    }
}
