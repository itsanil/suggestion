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
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('user_name')->unique();
            $table->string('employee_id')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('mobile')->length(11)->nullable();
            $table->longText('location_id')->default('[]');
            $table->longText('department_id')->default('[]');
            $table->string('gender')->nullable();
            $table->dateTime('joining_date')->nullable();
            $table->enum('status', ['1', '0'])->default(1);
            $table->longText('app_id')->default('[]');
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
