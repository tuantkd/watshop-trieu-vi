<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_khach_hang')->nullable();
            $table->foreign('id_khach_hang')->references('id')
            ->on('khach_hangs')->onDelete('cascade');

            $table->date('ngay_dat_hang')->nullable();
            
            $table->date('ngay_giao_hang')->nullable();

            $table->string('trang_thai')->nullable();



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
        Schema::dropIfExists('hoa_dons');
    }
}
