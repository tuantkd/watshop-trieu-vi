<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_loai_sp')->nullable();
            $table->foreign('id_loai_sp')->references('id')
            ->on('loai_san_phams')->onDelete('cascade');

            $table->unsignedBigInteger('id_xuat_xu')->nullable();
            $table->foreign('id_xuat_xu')->references('id')
            ->on('xuat_xus')->onDelete('cascade');

            $table->string('ten_san_pham')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->integer('gia_nhap')->nullable();
            $table->integer('gia_ban')->nullable();
            $table->integer('so_luong')->nullable();
            $table->string('xuat_xu')->nullable();
            $table->text('mieu_ta')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_phams');
    }
}
