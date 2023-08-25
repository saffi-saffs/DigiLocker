<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('file_verifications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('file_id');
        $table->unsignedBigInteger('verified_by')->nullable();
        $table->boolean('verified')->default(false);
        $table->timestamps();

        $table->foreign('file_id')->references('id')->on('files');
        $table->foreign('verified_by')->references('id')->on('admins');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_verifications');
    }
};
