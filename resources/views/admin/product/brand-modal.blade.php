<div class="modal fade" id="create-brand" tabindex="-1" role="dialog" aria-labelledby="create-brand-label"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-brand-label">برند جدید</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.create.brand') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">عنوان:</label>
                        <input type="text" class="form-control" name="name">
                        <x-input-error :messages="$errors->get('name')" class="error"/>
                    </div>
                    <input type="hidden" name="category_id" value="@if(isset($product)) {{ $product->category_id }} @else  @endif">
                    <div class="form-group">
                        <label for="en_name" class="col-form-label">عنوان انگلیسی (اختیاری):</label>
                        <input type="text" class="form-control" name="en_name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">بستن</button>
                <button type="button" class="btn btn-primary" onclick="createBrand();">ثبت</button>
            </div>
        </div>
    </div>
</div>
