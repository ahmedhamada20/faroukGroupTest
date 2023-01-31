<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_survey_id')->nullable()->constrained('page_surveys')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('questions_page_id')->nullable()->constrained('questions_pages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('answer_questions_type_checkboxe_id')->nullable()->constrained('answer_questions_type_checkboxes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('answer')->nullable();
            $table->longText('name')->nullable();
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
        Schema::dropIfExists('answer_questions');
    }
}
