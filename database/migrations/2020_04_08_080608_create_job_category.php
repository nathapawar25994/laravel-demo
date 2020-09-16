<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 3000)->nullable();
            $table->boolean('status')->default(1);
            $table->integer('created_by')->comment('User ID')->nullable();
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
        Schema::dropIfExists('job_category');
    }
}
