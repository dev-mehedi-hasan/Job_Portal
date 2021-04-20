<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quiz_subject_id')->nullable()->unsigned();
            $table->foreign('quiz_subject_id')->references('id')->on('quiz_subjects')->onDelete('cascade');
            $table->longText('q1')->nullable();
            $table->longText('a1')->nullable();
            $table->longText('q2')->nullable();
            $table->longText('a2')->nullable();
            $table->longText('q3')->nullable();
            $table->longText('a3')->nullable();
            $table->longText('q4')->nullable();
            $table->longText('a4')->nullable();
            $table->longText('q5')->nullable();
            $table->longText('a5')->nullable();
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
        Schema::dropIfExists('quiz_questions');
    }
}
