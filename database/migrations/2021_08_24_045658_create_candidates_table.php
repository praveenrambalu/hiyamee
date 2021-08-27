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
            $table->string('allocated_to')->nullable();
            $table->string('candidate_name')->nullable();
            $table->string('candidate_email')->nullable();
            $table->string('candidate_phone')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('pancard')->nullable();
            $table->string('gender')->nullable();
            $table->string('experience')->nullable();
            $table->string('relexperience')->nullable();

            $table->string('current_company')->nullable();
            $table->string('current_ctc')->nullable();
            $table->string('expected_ctc')->nullable();
            $table->string('neg_ctc')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('buyout')->nullable();
            $table->string('location')->nullable();
            $table->string('prelocation')->nullable();
            $table->string('interview_date')->nullable();
            $table->string('interview_time')->nullable();

            $table->string('job_position')->nullable();
            $table->string('job_company')->nullable();
            $table->string('interviewer_id')->nullable();
            $table->string('linkorfile')->nullable();
            $table->string('feedback')->nullable();
            $table->string('zoomlink')->nullable();


            $table->string('l1_date')->nullable();
            $table->string('l1_panelname')->nullable();
            $table->string('l1_rating')->nullable();
            $table->string('l1_feedback')->nullable();

            $table->string('l2_date')->nullable();
            $table->string('l2_panelname')->nullable();
            $table->string('l2_rating')->nullable();
            $table->string('l2_feedback')->nullable();

            $table->string('hr_date')->nullable();
            $table->string('hr_panelname')->nullable();
            $table->string('hr_rating')->nullable();
            $table->string('hr_feedback')->nullable();


            $table->string('offered_status')->nullable();
            $table->string('offered_date')->nullable();

            $table->string('feedback_form_status')->nullable();
            $table->string('feedback_form_aging')->nullable();
            $table->string('doj')->nullable();
            $table->string('month')->nullable();
            $table->string('so_number')->nullable();
            $table->string('offered_ctc')->nullable();
            $table->string('hire_level')->nullable();
            $table->string('hire_type')->nullable();

            $table->string('iaas')->nullable();




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
