<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSurvey;
use Illuminate\Http\Request;

class PageSurveyController extends Controller
{
    
    public function index()
    {
        $data = [
            'data' => PageSurvey::orderByDesc('id')->paginate(10),
        ];

        return view('admin.PageSurvey.index', $data);
    }

    
    public function create()
    {
        return view('admin.PageSurvey.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
        ],[
            'name.required'=> 'اسم الاستقصاء مطلوب',
            'name.string'=> 'يجب الادخال بشكل صحيح',
            'name.min'=> 'يجب ادخال الاسم اكتر من حرفين',
        ]);

        PageSurvey::create([
            'name' => $request->name,
            'notes' => $request->notes,
        ]);

        toastr()->success('تم انشاء الاستقصاء بنجاح');
        return redirect('pagesSurvey');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2',
        ],[
            'name.required'=> 'اسم الاستقصاء مطلوب',
            'name.string'=> 'يجب الادخال بشكل صحيح',
            'name.min'=> 'يجب ادخال الاسم اكتر من حرفين',
        ]);

        PageSurvey::findOrfail($request->id)->update([
            'name' => $request->name,
            'notes' => $request->notes,
        ]);

        toastr()->success('تم تعديل الاستقصاء بنجاح');
        return redirect('pagesSurvey');
    }

   
    public function destroy(Request $request, $id)
    {
        PageSurvey::destroy($request->id);
        toastr()->success('تم الحذف الاستقصاء بنجاح');
        return redirect('pagesSurvey');
    }
}
