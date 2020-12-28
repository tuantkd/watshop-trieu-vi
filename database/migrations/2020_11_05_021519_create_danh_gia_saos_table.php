<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiaSaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gia_saos', function (Blueprint $table) {
            $table->increments('id');

            $table->double('number_star')->nullable();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')
                ->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('id_sp')->nullable();
            $table->foreign('id_sp')->references('id')
                ->on('san_phams')->onDelete('cascade');

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
        Schema::dropIfExists('danh_gia_saos');
    }
}
