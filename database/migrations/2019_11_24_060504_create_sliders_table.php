<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year_of_established')->nullable();
            $table->string('caption')->unique(100);
            $table->string('sub_title')->nullable();
            $table->string('btn_label')->nullable();
            $table->string('btn')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
