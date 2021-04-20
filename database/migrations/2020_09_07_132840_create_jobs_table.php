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
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('office_name')->nullable();
            $table->string('position')->nullable();
            $table->longText('description')->nullable();
            $table->string('vacancy')->nullable();
            $table->longText('responsibilities')->nullable();
            $table->longText('skill_name')->nullable();
            $table->string('required_education')->nullable();
            $table->string('employment_status')->nullable();
            $table->double('salary')->nullable();
            $table->longText('other_benifits')->nullable();
            $table->longText('location')->nullable();
            $table->date('dead_line')->nullable();
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
