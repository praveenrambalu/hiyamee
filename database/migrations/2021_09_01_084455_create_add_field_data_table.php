<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddFieldDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_field_data', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_id')->nullable();
            $table->string('job_id')->nullable();
            $table->string('field_id')->nullable();
            $table->string('field_name')->nullable();
            $table->longText('field_value')->nullable();
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
        Schema::dropIfExists('add_field_data');
    }
}
