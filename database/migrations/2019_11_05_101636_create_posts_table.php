<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('host_id');
            $table->unsignedInteger('gym_id');
            $table->string('title');
            $table->text('about_group')->nullable();
            $table->timestamp('published_at');
            $table->timestamps();
            $table->bigInteger('fee')->nullable();
            $table->string('sex_limit')->nullable();
            $table->integer('number_limit')->nullable();
            $table->string('gym_img')->nullable();

            $table->foreign('host_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gym_id')->references('id')->on('gyms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
