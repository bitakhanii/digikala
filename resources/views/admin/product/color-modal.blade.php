<div class="modal fade" id="create-color" tabindex="-1" role="dialog" aria-labelledby="create-color-label"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-color-label">رنگ جدید</h5>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group text-center">
                        <p>رنگ مورد نظر خود را انتخاب کنید</p>
                        <input type="hidden" name="hex" value="">
                        <button type="button" class="btn btn-sm btn-primary color-picker">انتخاب رنگ</button>
                    </div>
                    <div class="form-group color-name" style="display: none;">
                        <label for="name" class="col-form-label">نام رنگ:</label>
                        <input type="text" class="form-control" name="name">
                        <x-input-error :messages="$errors->get('name')" class="error"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">بستن</button>
                <button type="button" class="btn btn-primary register" style="display: none;"
                        onclick="createColor();">ثبت
                </button>
            </div>
        </div>
    </div>
</div>
