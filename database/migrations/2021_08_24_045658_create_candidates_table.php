<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('job_id')->nullable();
            $table->string('candidate_name')->nullable();
            $table->string('candidate_email')->nullable();
            $table->string('candidate_phone')->nullable();

            $table->string('job_position')->nullable();
            $table->string('job_company')->nullable();
            $table->string('location')->nullable();
            $table->string('interviewer_id')->nullable();
            $table->string('expected_ctc')->nullable();
            $table->string('experience')->nullable();
            $table->string('linkorfile')->nullable();
            $table->string('feedback')->nullable();
            $table->string('zoomlink')->nullable();

            $table->string('interview_outcome')->default('Ready')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('additional_notes')->nullable();
            $table->string('uploaded_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->longText('update_history')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
