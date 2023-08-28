<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_verifyfiles', function (Blueprint $table) {
                 $table->id();
            $table->string('name');
            $table->string('file_path');
              $table->string('uploder_id');
            $table->string('file_type_id');
               $table->boolean('verified')->default(false);
        $table->unsignedBigInteger('verified_by')->nullable();
        $table->foreign('verified_by')->references('id')->on('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_verifyfiles');
    }
};
