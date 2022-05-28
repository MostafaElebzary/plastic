<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscriber_id')->nullable()->constrained('subscribers')->onDelete('cascade');
            $table->string('name');
            $table->string('phone');
            $table->string('phone2');
            $table->bigInteger('age');
            $table->string('address');
            $table->string('relation');
            $table->bigInteger('item_code')->unique();
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
        Schema::dropIfExists('families');
    }
}
