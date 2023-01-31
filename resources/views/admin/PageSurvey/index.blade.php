@extends('admin.layouts.master')
@section('title')
الاستقصاءات
@endsection
@section('css')



@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> الاستقصاءات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                الاستقصاءات</span>
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
                            data-target="#createNewpagesSurvey">انشاءاستقصاء جديد</a>

                    </div>
                    @include('admin.PageSurvey.create')
                </div>


            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table text-md-nowrap text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @forelse($data as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->name}}</td>
                                <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#editpagesSurvey{{ $row->id }}"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"  data-toggle="modal"
                                    data-target="#deletedpagesSurvey{{ $row->id }}"> <i class="fa fa-trash"></i></button>

                                    <a href="{{ route('questionsPage.show',$row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                </td>

                                @include('admin.PageSurvey.edit')
                                @include('admin.PageSurvey.deleted')
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="table-active text-center">No Data !</td>
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