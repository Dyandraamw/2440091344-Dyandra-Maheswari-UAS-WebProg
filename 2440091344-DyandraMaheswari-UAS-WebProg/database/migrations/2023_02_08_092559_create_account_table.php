<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->nullable()->constrained('roles','id')->cascadeOnDelete();
            $table->foreignId('gender_id')->nullable()->constrained('genders','id')->cascadeOnDelete();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('display_picture_link');
            $table->string('password');
            $table->rememberToken('remember_token')->nullable();
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
        Schema::dropIfExists('account');
    }
}
