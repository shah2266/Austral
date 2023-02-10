<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique(100);
            $table->string('address');
            $table->dateTime('from_date');
            $table->dateTime('to_date');
            $table->text('description');
            $table->string('original_image_path');
            $table->string('resize_image_path');
            $table->string('image');
            $table->tinyInteger('status')->default(0); //0 is in active, 1 is active
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
        Schema::dropIfExists('events');
    }
}
