<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('link')->nullable();
            $table->text('photo')->nullable();
            $table->timestamps();
        });
        // Schema::create('posts', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->text('content');
        //     $table->integer('cat_id');
        //     $table->text('meta_keywords')->nullable();
        //     $table->text('meta_description')->nullable();
        //     $table->text('photo')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
