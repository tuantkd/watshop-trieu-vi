<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonChiTietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_chi_tiets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_hoa_don')->nullable();
            $table->foreign('id_hoa_don')->references('id')
            ->on('hoa_dons')->onDelete('cascade');

            $table->unsignedBigInteger('id_san_pham')->nullable();
            $table->foreign('id_san_pham')->references('id')
            ->on('san_phams')->onDelete('cascade');

             $table->integer('tong_so_luong')->nullable();

             $table->integer('tong_gia')->nullable();

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
        Schema::dropIfExists('hoa_don_chi_tiets');
    }
}
