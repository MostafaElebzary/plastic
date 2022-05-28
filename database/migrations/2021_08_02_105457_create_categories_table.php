<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('parent')->nullable();
            $table->text('photo')->nullable();
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->timestamps();
        });

        // $table->id();
        // $table->string('title');
        // $table->text('content');
        // $table->string('title_en');
        // $table->text('content_en');
        // $table->integer('cat_id');
        // $table->integer('unique');
        // $table->text('meta_keywords')->nullable();
        // $table->text('meta_description')->nullable();
        // $table->text('photo')->nullable();
        // $table->text('photo2')->nullable();
        // $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
