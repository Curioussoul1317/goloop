<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('team_id')->nullable()->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->bigInteger('event_id')->nullable()->unsigned();
            $table->foreign('event_id')->references('id')->on('event_categories');
            $table->bigInteger('participants_id')->nullable()->unsigned();
            $table->foreign('participants_id')->references('id')->on('participants');
            $table->integer('event_progress')->nullable();
            $table->string('progress_date')->nullable();
            $table->string('img')->nullable();
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
        Schema::dropIfExists('progress');
    }
}
