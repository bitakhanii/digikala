<div class="modal fade" id="make-special" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('admin.product.make-special', $product->id) }}" method="post" id="special-form">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="special_time" class="col-form-label">مدت زمان شگفت انگیز بودن را مشخص کنید (ساعت)</label>
                        <input type="text" class="form-control" name="special_time">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">انصراف</button>
                <button type="submit" class="btn btn-primary" onclick="makeSpecial();">ثبت</button>
            </div>
        </div>
    </div>
</div>
