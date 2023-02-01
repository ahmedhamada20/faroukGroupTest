<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerQuestions extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_survey_id',
        'questions_page_id',
        // 'answer_questions_type_checkboxe_id',
        'answer',
        'name',
    ];


    public function page_survey()
    {
        return $this->belongsTo(PageSurvey::class, 'page_survey_id');
    }
    public function questions_page()
    {
        return $this->belongsTo(QuestionsPage::class, 'questions_page_id');
    }
    // public function answer_questions_type_checkboxe()
    // {
    //     return $this->belongsTo(AnswerQuestionsTypeCheckbox::class, 'answer_questions_type_checkboxe_id');
    // }
}
