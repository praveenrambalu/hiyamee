<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_assigns', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('company_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('industry')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->default('active')->nullable();
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
        Schema::dropIfExists('company_assigns');
    }
}
