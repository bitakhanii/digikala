@component('admin.layouts.content')

    <script src="/bootstrapSelect/bootstrap-select.js"></script>
    <link href="/bootstrapSelect/bootstrap-select.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <link href="/picker/nano.min.css" rel="stylesheet">
    <link href="/picker/monolith.min.css" rel="stylesheet">
    <link href="/picker/classic.min.css" rel="stylesheet">

    <script src="/picker/pickr.min.js"></script>
    <script src="/picker/pickr.es5.min.js"></script>


    <style>

        label {
            font-weight: 400 !important;
        }

        label:not(label.attr-label) {
            background-color: rgba(255, 193, 7, 0.32);
            border-radius: 3px;
            padding: 0 2px;
        }

        .select2-search__field {
            width: 80% !important;
        }

        .color-span {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 100%;
            float: left;
            margin: 2px 5px 0 0;
        }

        .select2-selection__choice > div {
            display: inline-block;
        }

        .select2-selection__choice__remove {
            position: relative;
            top: 2px;
            margin-left: 5px;
        }

        .old-cat i:not(i:last-child) {
            display: inline-block;
            width: 10px;
            height: 15px;
            background: url("/images/slices.png") -703px -285px;
            position: relative;
            top: 5px;
        }

        .category-select {
            display: none;
        }

        .special-box span {
            margin-right: 10px;
            font-size: 11pt;
        }

        .true-icon {
            width: 18px;
            height: 18px;
            background: url('/images/slices.png') -108px -78px;
            display: inline-block;
        }

    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <!--.card-header -->
                <div class="card-header">
                    <h3 class="card-title">
                        ویرایش محصول "{{ $product->title }}"
                    </h3>
                </div>
                <!-- /.card-header -->

                <!--.card-body -->
                <div class="card-body">
                    @can('delete-product')
                        <form id="delete-product" class="float-left"
                              action="{{ route('admin.product.destroy', $product->id) }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-md btn-danger delete-product">حذف محصول</button>
                        </form>
                    @endcan
                    <form
                        action="{{ route('admin.product.update', $product->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>عنوان*</label>
                            <input type="text" class="form-control col-8 @error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{ old('title', $product->title) }}">
                            <x-input-error :messages="$errors->get('title')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>عنوان انگلیسی</label>
                            <input type="text" class="form-control col-8 @error('en_title') is-invalid @enderror"
                                   name="en_title"
                                   value="{{ old('en_title', $product->en_title) }}">
                            <x-input-error :messages="$errors->get('en_title')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>قیمت*</label>
                            <input id="price" type="text"
                                   class="form-control col-5 @error('price') is-invalid @enderror" name="price"
                                   value="{{ old('price', number_format($product->price)) }}">
                            <x-input-error :messages="$errors->get('price')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>تخفیف (درصد)</label>
                            <input id="discount" type="number"
                                   class="form-control col-2 @error('discount') is-invalid @enderror" name="discount"
                                   value="{{ old('discount', @$product->discount) }}">
                            <x-input-error :messages="$errors->get('discount')" class="error"/>
                        </div>

                        <div class="form-group old-cat">
                            <label>دسته بندی</label>
                            @foreach($oldCategories as $category)
                                <span class="badge bg-primary">{{ $category->title }}</span>
                                <i></i>
                            @endforeach
                        </div>

                        @can('edit-product', $product->user)
                            <div class="form-group">
                                <button type="button" class="btn btn-sm btn-danger" onclick="showCategorySelect(this);">
                                    تغییر دسته‌بندی
                                </button>
                            </div>
                        @endcan

                        <div class="category-select">
                            <div class="form-group">
                                <label class="ml-4">دسته‌بندی سطح 1*</label>
                                <select class="form-control select-2 col-4" name="category-1"
                                        onchange="loadSubCategory(1);">
                                    <option value="">انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if(old('category-1') == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('category_id')" class="error"/>
                        </div>

                        <div class="brand-select">
                            <div class="form-group">
                                <label class="ml-4">برند</label>
                                <select class="form-control select-2 col-4" name="brand_id">
                                    <option value="">انتخاب کنید</option>
                                    <option value="null">no brand</option>
                                    @foreach($product->category->brands as $brand)
                                        <option value="{{ $brand->id }}"
                                                @if($brand->id == $product->brand_id) selected="selected" @endif>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @can('edit-product', $product->user)
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="showBrandModal();">
                                        برند
                                        جدید بسازید
                                    </button>
                                @endcan
                                <x-input-error :messages="$errors->get('brand_id')" class="error"/>
                            </div>
                        </div>

                        <div id="attribute-select">
                            @if($product->attributes()->count() > 0)
                                <label>ویژگی‌ها</label>
                                @foreach($product->category->attributes as $attribute)
                                    <div class="form-group">
                                        <label class="ml-4 col-2 attr-label">{{ $attribute->title }}</label>
                                        <select
                                            class="value-select col-3" name="attribute-{{ $attribute->id }}">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($attribute->values as $value)
                                                <option value="{{ $value->id }}"
                                                        @if($product->attributes->contains('id', $attribute->id) && $product->attributes->where('id', $attribute->id)->first()->pivot->value_id == $value->id) selected="selected" @endif>{{ $value->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="form-group">
                            <label>گارانتی</label>
                            <input type="text" class="form-control col-8" name="guarantee"
                                   value="{{ old('guarantee', $product->guarantee) }}">
                        </div>

                        <div class="form-group">
                            <label>وزن محصول (گرم)</label>
                            <input id="weight" type="text"
                                   class="form-control col-2 @error('weight') is-invalid @enderror" name="weight"
                                   value="{{ old('weight', number_format($product->weight)) }}">
                            <x-input-error :messages="$errors->get('weight')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>توضیحات</label>
                            <textarea id="introduction"
                                      name="introduction">{{ old('introduction', $product->introduction) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>تصویر شاخص*</label>
                            <img src="/images/products/{{ $product->id }}/product-{{ $product->id }}.jpg" height="200"
                                 style="margin-bottom: 20px;">
                            @can('edit-product', $product->user)
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       name="image"
                                       value="">
                            @endcan
                            <x-input-error :messages="$errors->get('image')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>موجودی*</label>
                            <input id="inventory" type="text"
                                   class="form-control col-2 @error('inventory') is-invalid @enderror" name="inventory"
                                   value="{{ old('inventory', $product->inventory) }}">
                            <x-input-error :messages="$errors->get('inventory')" class="error"/>
                        </div>

                        <div id="color-select">
                            <div class="form-group">
                                <label>رنگ‌بندی</label>
                                <select name="colors[]" class="form-control col-4 select3" multiple>
                                    @foreach(\App\Models\Color::all() as $color)
                                        <option value="{{ $color->id }}"
                                                data-hex="{{ $color->hex }}" @foreach($product->colors as $productColor)
                                                    @if($color->id == $productColor->id) selected="selected" @endif
                                            @endforeach>{{ $color->name }}</option>
                                    @endforeach
                                </select>
                                @can('edit-product', $product->user)
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                                            data-target="#create-color">رنگ دلخواه خود را بسازید
                                    </button>
                                @endcan
                            </div>
                        </div>

                        @can('special-product')
                            <div class="form-group special">
                                <label>شگفت انگیز</label>
                                @if($product->special_time < time())
                                    <button type="button" class="btn btn-sm btn-success special-btn" data-toggle="modal"
                                            data-target="#make-special">افزودن محصول به شگفت انگیزها
                                    </button>
                                @else
                                    <div class="form-group special-box">
                                        <i class="true-icon"></i>
                                        <span>انقضا:</span>
                                        <div class="bg-success disabled color-palette col-4">
                                            <span>روز: {{ jdate($product->special_time)->format('%e %B %Y') }} ساعت: {{ jdate($product->special_time)->format('%H:%M') }}</span>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-success mt-3 remove-special">اتمام
                                            مدت زمان شگفت
                                            انگیز
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endcan

                        @can('edit-product', $product->user)
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-md btn-warning col-2">
                                    ویرایش محصول
                                </button>
                            </div>
                        @endcan
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    @include('admin.product.brand-modal')
    @include('admin.product.color-modal')
    @include('admin.product.special-modal')
    @include('admin.product.js-methods')

    <script>
        $(document).on('click', '.delete-product', function () {

            Swal.fire({
                title: 'مطمئنید؟',
                text: "این محصول برای همیشه حذف خواهد شد!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-product').submit();
                }
            })
        });

        function showCategorySelect(tag) {
            $('.category-select').fadeIn();
            $(tag).remove();
        }

        function makeSpecial() {

            $.ajax({
                type: 'PATCH',
                url: '{{ route('admin.product.make-special', $product->id) }}',
                data: $('#special-form').serializeArray(),
                success: function (msg) {
                    $('#make-special').modal('hide');
                    Swal.fire({
                        text: 'عملیات با موفقیت انجام شد',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    $('.special-btn').remove();
                    var specialBox = '<div class="form-group special-box"><i class="true-icon"></i><span>انقضا:</span><div class="bg-success disabled color-palette col-4"><span>روز: ' + msg['date'] + ' ساعت: ' + msg['hour'] + '</span></div><button type="button" class="btn btn-sm btn-success mt-3 remove-special">اتمام مدت زمان شگفت انگیز</button></div>';
                    $('.special').append(specialBox);
                },
                error: function (msg) {
                    Swal.fire({
                        text: msg.responseJSON.error,
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                }
            });
        }

        function removeSpecial() {

            $.ajax({
                type: 'PATCH',
                url: '{{ route('admin.product.remove-special', $product->id) }}',
                data: {},
                success: function (msg) {
                    Swal.fire({
                        text: 'عملیات با موفقیت انجام شد',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    $('.special-box').remove();
                    var button = '<button type="button" class="btn btn-sm btn-danger special-btn" data-toggle="modal" data-target="#make-special">افزودن محصول به شگفت انگیزها</button>';
                    $('.special').append(button);
                }
            });
        }

        $(document).on('click', '.remove-special', function () {

            Swal.fire({
                title: 'مطمئنید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    removeSpecial();
                }
            })
        });

    </script>

@endcomponent
