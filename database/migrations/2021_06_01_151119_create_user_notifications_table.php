<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('posts_id')->unsigned()->nullable();
            $table->foreign('posts_id')->references('id')->on('posts');
            $table->bigInteger('participation_id')->unsigned()->nullable();
            $table->foreign('participation_id')->references('id')->on('participants');
            $table->bigInteger('follow_id')->unsigned()->nullable();
            $table->foreign('follow_id')->references('id')->on('follows');
            $table->bigInteger('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->string('notification')->nullable();
            $table->integer('status')->nullable();
            $table->bigInteger('by_user_id')->unsigned()->nullable();
            $table->foreign('by_user_id')->references('id')->on('users');
            $table->bigInteger('to_user_id')->unsigned()->nullable();
            $table->foreign('to_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_notifications');
    }
}
