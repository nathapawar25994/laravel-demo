<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ColumnNullableTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_category', function ($table) {
            $table->integer('created_by')->comment('User ID')->nullable()->change();
        });

        Schema::table('job_type', function ($table) {
            $table->integer('created_by')->comment('User ID')->nullable()->change();
        });

        Schema::table('job', function ($table) {
            $table->integer('created_by')->comment('User ID')->nullable()->change();
        });

        Schema::table('refered_from', function ($table) {
            $table->integer('created_by')->comment('User ID')->nullable()->change();
        });

        Schema::table('job_application', function ($table) {
            $table->integer('verified_by')->comment('User ID')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
