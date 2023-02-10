<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('project_type');
            $table->string('project_name')->unique(100);
            $table->string('address');
            $table->float('total_area');
            $table->integer('number_of_unit');
            $table->integer('flat');
            $table->tinyInteger('lift');
            $table->integer('parking_space');
            $table->text('features')->nullable();
            $table->dateTime('handover_date_time')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
