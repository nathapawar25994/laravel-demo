<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_code', 255);
            $table->string('title', 1000);
            $table->string('sub_title', 3000)->nullable();
            $table->date('last_date_to_submit');
            $table->integer('job_category_id')->comment('Job Category ID');
            $table->integer('job_type_id')->comment('Job Type ID');
            $table->integer('country_id')->comment('Country ID')->nullable();
            $table->integer('state_id')->comment('State ID')->nullable();
            $table->integer('city_id')->comment('City ID')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('created_by')->comment('User ID');
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
        Schema::dropIfExists('job');
    }
}
