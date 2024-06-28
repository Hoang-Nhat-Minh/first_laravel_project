<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserresevationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userresevations', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->date('ngaydat');
            $table->time('thoigian');
            $table->tinyInteger('soluongnguoi'); // Sử dụng kiểu dữ liệu TINYINT
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
        Schema::dropIfExists('userresevations');
    }
}
