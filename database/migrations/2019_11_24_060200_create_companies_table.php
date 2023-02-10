<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo')->nullable();
            $table->string('company_name')->unique(50);
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('telephone');
            $table->string('copy_right_text');
            $table->string('social_link_icon_1')->nullable();
            $table->string('social_link_icon_2')->nullable();
            $table->string('social_link_icon_3')->nullable();
            $table->string('social_link_icon_4')->nullable();
            $table->string('social_link_icon_5')->nullable();
            $table->string('social_link1')->nullable();
            $table->string('social_link2')->nullable();
            $table->string('social_link3')->nullable();
            $table->string('social_link4')->nullable();
            $table->string('social_link5')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('map_content')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
