<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'page_survey_id',
    ];


    public function page_survey()
    {
        return $this->belongsTo(PageSurvey::class, 'page_survey_id');
    }

    public function answerTypeCheckbox()
    {
        return $this->hasMany(AnswerQuestionsTypeCheckbox::class, 'questions_page_id');
    }
}
