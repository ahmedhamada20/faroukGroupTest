<!-- Modal -->
<div class="modal fade" id="editpagesSurvey{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل استقصاء </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pagesSurvey.update','pagesSurvey') }}" method="post" autocomplete="off">
                   @method('PUT')
                    @csrf

                    <input type="hidden" value="{{ $row->id }}" name="id">

                    <div class="row">
                        <div class="col">
                            <label>اسم الاستقصاء</label>
                            <input type="text" name="name" value="{{ $row->name }}" min="2" class="form-control">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>وصف الاستقصاء</label>
                            <textarea class="form-control" rows="5" name="notes">
                                {{ $row->notes }}
                            </textarea>
                        </div>
                    </div>

                    <br>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                    </div>

                </form>
            </div>
          
        </div>
    </div>
</div>