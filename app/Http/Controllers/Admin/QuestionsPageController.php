<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSurvey;
use App\Models\QuestionsPage;
use Illuminate\Http\Request;

class QuestionsPageController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'type' => 'required|in:text,textarea,checkbox',
        ], [
            'type.in' => 'نوع الاجابه غير صحيح',
            'type.required' => 'نوع الاجابه مطلوب',
            'name.required' => 'اسم الؤال مطلوب',
            'name.string' => 'يجب الادخال بشكل صحيح',
            'name.min' => 'يجب ادخال الاسم اكتر من حرفين',

        ]);

        QuestionsPage::create([
            'name' => $request->name,
            'type' => $request->type,
            'page_survey_id' => $request->page_survey_id,
        ]);

        toastr()->success('تم انشاء السؤال بنجاح');
        return redirect()->back();
    }


    public function show($id)
    {
        $data = [
            'data' => QuestionsPage::where('page_survey_id', $id)->paginate(10),
            'survey' => PageSurvey::findorfail($id),
        ];

        return view('admin.QuestionsPage.index', $data);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'type' => 'required|in:text,textarea,checkbox',
        ], [
            'type.in' => 'نوع الاجابه غير صحيح',
            'type.required' => 'نوع الاجابه مطلوب',
            'name.required' => 'اسم الؤال مطلوب',
            'name.string' => 'يجب الادخال بشكل صحيح',
            'name.min' => 'يجب ادخال الاسم اكتر من حرفين',

        ]);

        QuestionsPage::findorfail($request->id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'page_survey_id' => $request->page_survey_id,
        ]);

        toastr()->success('تم تعديل السؤال بنجاح');
        return redirect()->back();
    }


    public function destroy(Request $request, $id)
    {
        QuestionsPage::destroy($request->id);
        toastr()->success('تم حذف السؤال بنجاح');
        return redirect()->back();
    }
}
