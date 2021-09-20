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
            $table->bigIncrements('id');
            $table->string('nic')->unique();
            $table->string('full_name')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('wall_pic')->nullable();
            $table->string('password')->nullable();
            $table->string('otp_code')->nullable();
            $table->string('verification_code')->nullable();
            $table->integer('is_verified')->default(0);
            $table->integer('account_of')->nullable();
            $table->string('account_type')->nullable();
            $table->integer('account_status')->nullable();
            $table->integer('account_privacy')->nullable();
            $table->integer('post_privacy')->nullable();
            $table->rememberToken();
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
