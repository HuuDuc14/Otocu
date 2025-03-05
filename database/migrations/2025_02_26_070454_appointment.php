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
        Schema::create('appointment', function (Blueprint $table) {  //xem sau
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_seller');
            $table->unsignedBigInteger('id_post');
            $table->date('date');
            $table->boolean('status');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_customer')->references('id')->on('user');
            $table->foreign('id_seller')->references('id')->on('user');
            $table->foreign('id_post')->references('id')->on('post');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
