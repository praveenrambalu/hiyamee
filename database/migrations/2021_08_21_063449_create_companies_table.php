<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('industry')->nullable();
            $table->string('logo')->nullable();
            $table->longText('description')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('contactno')->nullable();
            $table->string('pincode')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
