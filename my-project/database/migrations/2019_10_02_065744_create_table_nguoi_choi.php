<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNguoiChoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_choi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ten_dang_nhap');
            $table->string('mat_khau');
            $table->string('email');
            $table->string('ho_ten')->default('');
            $table->string('ngay_sinh')->default('');
            $table->string('so_dien_thoai')->default('');
            $table->string('hinh_dai_dien')->default('');
            $table->integer('diem_cao_nhat')->default(0);
            $table->integer('credit')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoi_choi');
    }
}
