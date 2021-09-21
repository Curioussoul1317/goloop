<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('participation_id')->unsigned()->nullable();
            $table->foreign('participation_id')->references('id')->on('participants'); 
            $table->bigInteger('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->bigInteger('cart_id')->unsigned()->nullable();
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->string('notification')->nullable();
            $table->integer('status')->nullable();
            $table->bigInteger('by_user_id')->unsigned()->nullable();
            $table->foreign('by_user_id')->references('id')->on('users'); 
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
        Schema::dropIfExists('admin_notifications');
    }
}
