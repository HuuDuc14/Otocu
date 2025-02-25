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
        Schema::table('post', function (Blueprint $table) {
            $table->dropForeign(['id_address']); 
            $table->dropColumn('id_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post', function (Blueprint $table) {
            $table->unsignedBigInteger('id_address')->nullable();
            $table->foreign('id_address')->references('id')->on('address')->onDelete('cascade');
        });
    }
};
