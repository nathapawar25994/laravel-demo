<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_application', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->comment('JOB ID')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('comments', 3000)->nullable();
            $table->integer('refered_from_id')->comment('Refered From ID')->nullable();
            $table->string('resume_file', 1000)->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('job_status')->default(0);
            $table->integer('verified_by')->comment('User ID')->nullable();
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
        Schema::dropIfExists('job_application');
    }
}
