<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_data', function (Blueprint $table) {
            $table->id();
            $table->date('ngayBlog');
            $table->text('header');
            $table->text('blogImg');
            $table->text('shortInfo');
            $table->text('deltailInfo1')->nullable();
            $table->text('blogDeltailImg1')->nullable();
            $table->text('deltailInfo2')->nullable();
            $table->text('blogDeltailImg2')->nullable();
            $table->text('deltailInfo3')->nullable();
            $table->text('blogDeltailImg3')->nullable();
            $table->text('deltailInfo4')->nullable();
            $table->text('blogDeltailImg4')->nullable();
            $table->text('deltailInfo5')->nullable();
            $table->text('blogDeltailImg5')->nullable();
            $table->text('slug');
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
        Schema::dropIfExists('blog_data');
    }
}
