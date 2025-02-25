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
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade'); // Ràng buộc khóa ngoại

            // Thêm cột district_id làm khóa ngoại
            $table->unsignedBigInteger('district_id')->nullable(); // Tạo cột district_id
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade'); // Ràng buộc khóa ngoại
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
            $table->dropColumn('province_id');

            $table->dropForeign(['district_id']);
            $table->dropColumn('district_id');
        });
    }
};
