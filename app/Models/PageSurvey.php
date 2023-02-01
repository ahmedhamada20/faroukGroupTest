<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSurvey extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'notes',
    ];

    public function questionsPage()
    {
        return $this->hasMany(QuestionsPage::class, 'page_survey_id');
    }


    public function totalCount()
    {
       return AnswerQuestions::where('page_survey_id', $this->id)->count();
    }


}
