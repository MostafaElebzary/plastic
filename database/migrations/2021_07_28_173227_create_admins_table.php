<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->text('photo')->nullable();
            $table->tinyInteger('is_active');
            $table->tinyInteger('role_id');
            $table->rememberToken();
            $table->timestamps();
        });

        // $table->id();
        // $table->string('name');
        // $table->tinyInteger('parent')->nullable();
        // $table->text('photo')->nullable();
        // $table->text('meta_keywords');
        // $table->text('meta_description');
        // $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
