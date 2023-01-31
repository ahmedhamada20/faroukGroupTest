<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerQuestionsTypeCheckbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'questions_page_id',
    ];


    public function questions_page()
    {
        return $this->belongsTo(QuestionsPage::class, 'questions_page_id');
    }
}
