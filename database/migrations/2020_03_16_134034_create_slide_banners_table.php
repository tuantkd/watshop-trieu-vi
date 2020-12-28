<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_banners', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_san_pham')->nullable();
            $table->foreign('id_san_pham')->references('id')
            ->on('san_phams')->onDelete('cascade');

            $table->string('hinh_anh_slide')->nullable();

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
        Schema::dropIfExists('slide_banners');
    }
}
