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
    Schema::table('files', function (Blueprint $table) {
        $table->boolean('verified')->default(false);
        $table->unsignedBigInteger('verified_by')->nullable();
        $table->foreign('verified_by')->references('id')->on('admins');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('files', function (Blueprint $table) {
            //
        });
    }
};
