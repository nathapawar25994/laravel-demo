<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobBaseSalary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_base_salary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_id')->comment('JOB ID')->nullable();
            $table->integer('currency_id')->comment('Currency ID');
            $table->integer('salary_period_id')->comment('Salary Period ID');
            $table->boolean('is_range')->default(1);
            $table->integer('value')->nullable();
            $table->integer('min_value')->nullable();
            $table->integer('max_value')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('job_base_salary');
    }
}
