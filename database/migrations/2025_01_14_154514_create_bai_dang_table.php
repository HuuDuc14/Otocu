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
        Schema::create('bai_dang', function (Blueprint $table) {
            $table->id('id_bai_dang');
            $table->string('tieu_de', 55);
            $table->decimal('gia', 15, 2);
            $table->integer('nam_san_xuat');
            $table->integer('km_da_di');
            $table->string('mau_xe', 55);
            $table->enum('nhien_lieu', ['xăng', 'điện', 'dầu']);
            $table->enum('hop_so', ['số sàn', 'số tự động']);
            $table->integer('cho_ngoi');
            $table->enum('trang_thai', ['chờ duyệt', 'đã duyệt', 'bị từ chối']);
            $table->string('url_hinh', 255);
            $table->unsignedBigInteger('id_kieu_dang');
            $table->unsignedBigInteger('id_nguoi_dung');
            $table->unsignedBigInteger('id_hang_xe');
            $table->unsignedBigInteger('id_dia_chi');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_kieu_dang')->references('id_kieu_dang')->on('kieu_dang');
            $table->foreign('id_nguoi_dung')->references('id_nguoi_dung')->on('nguoi_dung');
            $table->foreign('id_hang_xe')->references('id_hang_xe')->on('hang_xe');
            $table->foreign('id_dia_chi')->references('id_dia_chi')->on('dia_chi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bai_dang');
    }
};
