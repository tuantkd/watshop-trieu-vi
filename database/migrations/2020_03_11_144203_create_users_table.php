<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_truy_cap')->nullable();
            $table->foreign('id_truy_cap')->references('id')
            ->on('quyen_truy_caps')->onDelete('cascade');

            $table->string('ho_ten')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->string('ten_tai_khoan')->nullable()->unique();
            $table->string('mat_khau')->nullable();
            $table->string('email')->nullable();
            $table->string('gioi_tinh')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->integer('dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
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
        Schema::dropIfExists('users');
    }
}
