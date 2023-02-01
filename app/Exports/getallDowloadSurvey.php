<?php

namespace App\Exports;

use App\Models\AnswerQuestions;
use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class getallDowloadSurvey implements FromCollection, WithHeadings
{

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return AnswerQuestions::where('page_survey_id', $this->id)->orderBy('id', 'DESC')->get([

            'name',
            'phone',
            'email',
            'questions_page_id',
            'answer',

        ]);
    }





    public function headings(): array
    {
        return [
            'الإسم',
            'رقم الهاتف',
            'البريد الالكتروني',
            'السؤال',
            'الاجابه',

        ];
    }
}
