<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('company_id')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('job_title')->nullable();
            $table->string('location')->nullable();
            $table->longText('description')->nullable();
            $table->string('primary_skill')->nullable();
            $table->string('skills_required')->nullable();
            $table->string('how_many_hires')->nullable();
            $table->string('annual_ctc')->nullable();
            $table->string('status')->default('active')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
