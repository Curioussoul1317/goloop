<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMedalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_medals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('team_id')->nullable()->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->bigInteger('participants_id')->nullable()->unsigned();
            $table->foreign('participants_id')->references('id')->on('participants');
            $table->bigInteger('event_id')->nullable()->unsigned();
            $table->foreign('event_id')->references('id')->on('event_categories');
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
        Schema::dropIfExists('user_medals');
    }
}
