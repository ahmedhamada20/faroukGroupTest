@extends('front.layouts.master')
@section('title')
{{ $pages->name }}
@endsection

@section('content')
<!-- Start Page Banner -->


<div class="page-banner-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>{{ $pages->name }}</h2>
                    <ul>
                        <li>
                            <a href="{{route('home')}}"> {{__('index.Home')}}</a>
                        </li>
                        <li>{{ $pages->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- End Page Banner -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- Start Register Area -->
<section class="register-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="register-image">
                    <img src="{{asset('front/assets/img/aftersales.jpg')}}" alt="image">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="register-form">
                    <h2 class="text-danger"> {{ $pages->name }}</h2>

                    <form action="{{ route('storeSurvey') }}" method="post" autocomplete="off">
                        @csrf

                        <input type="hidden" value="{{ $pages->id }}" name="page_survey_id">

                        <div class="row">
                            <div class="col">
                                <label class="mb-1 h6"> الاسم </label>

                                <input type="text" name="name" required class="form-control">
                            </div>
                        </div>

                        <br>

                        @foreach ($pages->questionsPage as $data )
                        <input type="hidden" value="{{ $data->id }}" name="questions_page_id">
                        @if ($data->type == 'text')
                        <label class="mb-1">{{ $data->name }}</label>
                        <input type="hidden" class="form-control" name="{{ $data->id }}" >
                        <input type="text" class="form-control" required name="answer[]" >
                        <br>
                        @elseif ($data->type == 'textarea')
                        <label class="mb-1">{{ $data->name }}</label>
                        <input type="hidden" class="form-control" name="{{ $data->id }}" >
                        <textarea class="form-control" required name="answer[]" rows="5"></textarea>
                       <br>
                        @else


                        <div class="row container">
                            <hr>
                            <div class="col">
                                <label class="mb-1">{{ $data->name }}</label>
                            </div>
                         
                            @foreach ($data->answerTypeCheckbox as $types)
                            <input type="hidden" value="{{ $types->id }}" name="answer_questions_type_checkboxe_id">

                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" name="answer[]-{{ $types->id }}" id="exampleRadios1_{{ $types->id }}" value="{{ $types->name }}" required>
                                <label class="form-check-label" for="exampleRadios1_{{ $types->id }}">
                                  {{ $types->name }}
                                </label>
                              </div>
                         
                            @endforeach
                            
                        </div>
                        




                        @endif
                        @endforeach


                        <button type="submit" class="default-btn">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Register Area -->

@endsection


@section('js')
@endsection