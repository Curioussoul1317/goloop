<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')->on('events');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('apply_before')->nullable();
            $table->string('catog_event_state')->nullable();
            $table->integer('price')->nullable();
            $table->integer('km')->nullable();
            $table->string('category')->nullable();
            $table->string('medal_img')->nullable();
            $table->string('bib_img')->nullable();
            $table->string('catog_event_img')->nullable();
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
        Schema::dropIfExists('event_categories');
    }
}
