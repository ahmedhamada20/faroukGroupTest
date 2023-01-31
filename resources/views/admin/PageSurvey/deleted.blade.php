<!-- Modal -->
<div class="modal fade" id="deletedpagesSurvey{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف استقصاء </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pagesSurvey.destroy','pagesSurvey') }}" method="post" autocomplete="off">
                   @method('DELETE')
                    @csrf

                    <input type="hidden" value="{{ $row->id }}" name="id">

                    <div class="row">
                        <div class="col">
                            <label class="h3"> هل انت متأكد من حذف الاستقصاء بكل الاسئله وجميع الاجابات الخاصه بالاعضاء لهذا الاستقصاء ؟</label>
                            <input type="text" readonly  value="{{ $row->name }}" min="2" class="form-control">
                        </div>
                    </div>


                    <br>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-danger">تاكيد الحذف</button>
                    </div>

                </form>
            </div>
          
        </div>
    </div>
</div>