@extends('admin.layouts.master')
@section('title')
اساله الاستقصاء
@endsection
@section('css')



@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> اساله الاستقصاء : {{ $survey->name }} </h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ $survey->name }}
            </span>
        </div>
    </div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="flash-message"></div>

                <div class="row">
                    <div class="col">


                        <a href="{{route('pagesSurvey.create')}}" class="btn btn-success" data-toggle="modal"
                            data-target="#createNewpagesSurvey">انشاء سؤال جديد</a>

                    </div>
                    @include('admin.QuestionsPage.create')
                </div>


            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table text-md-nowrap text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>type</th>
                                <th>Answer Checkbox</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @forelse($data as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->type}}</td>
                                <td>
                                    <ul>
                                        @foreach($row->answerTypeCheckbox as $date)
                                        <li>
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    {{$date->name}} 
                                                </div>

                                                <div class="col-2">
                                                    <form action="{{ route('answerQuestionsTypeCheckbox.destroy','answerQuestionsTypeCheckbox') }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="hidden" name="id_answerTypeCheckbox" value="{{ $date->id }}">
                                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                         
                                        
                                           
                                        </li>
                                    
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    @if ($row->type == 'checkbox')
                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#answerTypeCheckbox{{ $row->id }}"><i class="fa fa-eye"></i></button>
                                    @endif
                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#editpagesSurvey{{ $row->id }}"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deletedpagesSurvey{{ $row->id }}"> <i
                                            class="fa fa-trash"></i></button>
                                </td>

                                @include('admin.QuestionsPage.edit')
                                @include('admin.QuestionsPage.deleted')
                                @include('admin.QuestionsPage.show')
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="table-active text-center">No Data !</td>
                            </tr>
                            @endforelse
                    </table>
                    {{ $data->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')

<script>
    $(function () {
            $('.toggle-class').change(function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('updatePackagesStatus') }}',
                    data: {'status': status, 'user_id': user_id},
                    success: function (data) {
                        toastr.success('Data Update Successfully');
                    }
                });
            })
        })
</script>
@endsection