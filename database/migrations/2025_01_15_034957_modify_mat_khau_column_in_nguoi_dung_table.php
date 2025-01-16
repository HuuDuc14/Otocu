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
        Schema::table('nguoi_dung', function (Blueprint $table) {
            // Sửa độ dài cột mat_khau thành 255 ký tự
            $table->string('mat_khau', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nguoi_dung', function (Blueprint $table) {
            // Khôi phục lại độ dài cột mat_khau (nếu cần)
            $table->string('mat_khau', 55)->change();
        });
    }
};
