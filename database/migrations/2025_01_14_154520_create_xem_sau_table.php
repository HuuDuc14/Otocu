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
        Schema::create('xem_sau', function (Blueprint $table) {
            $table->id('id_xem_sau');
            $table->unsignedBigInteger('id_nguoi_dung');
            $table->unsignedBigInteger('id_bai_dang');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_nguoi_dung')->references('id_nguoi_dung')->on('nguoi_dung');
            $table->foreign('id_bai_dang')->references('id_bai_dang')->on('bai_dang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xem_sau');
    }
};
