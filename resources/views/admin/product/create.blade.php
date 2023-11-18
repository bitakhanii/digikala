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

    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <!--.card-header -->
                <div class="card-header">
                    <h3 class="card-title">
                        @if(isset($product))
                            ویرایش محصول "{{ $product->title }}"
                        @else
                            ایجاد یک محصول جدید
                        @endif
                    </h3>
                </div>
                <!-- /.card-header -->

                <!--.card-body -->
                <div class="card-body">
                    @if(isset($product))
                        <form id="delete-product" class="float-left"
                              action="{{ route('admin.product.destroy', $product->id) }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-md btn-danger delete-product">حذف محصول</button>
                        </form>
                    @endif

                    <form
                        action="@if(isset($product)) {{ route('admin.product.update', $product->id) }} @else {{ route('admin.product.store') }} @endif"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($product))
                            @method('PATCH')
                        @endif
                        <div class="form-group">
                            <label>عنوان*</label>
                            <input type="text" class="form-control col-8 @error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{ old('title') }}">
                            <x-input-error :messages="$errors->get('title')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>عنوان انگلیسی</label>
                            <input type="text" class="form-control col-8 @error('en_title') is-invalid @enderror"
                                   name="en_title"
                                   value="{{ old('en_title') }}">
                            <x-input-error :messages="$errors->get('en_title')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>قیمت*</label>
                            <input id="price" type="text"
                                   class="form-control col-5 @error('price') is-invalid @enderror" name="price"
                                   value="{{ old('price') }}">
                            <x-input-error :messages="$errors->get('price')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>تخفیف (درصد)</label>
                            <input id="discount" type="number"
                                   class="form-control col-2 @error('discount') is-invalid @enderror" name="discount"
                                   value="{{ old('discount') }}">
                            <x-input-error :messages="$errors->get('discount')" class="error"/>
                        </div>

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
                                <select class="form-control select-2 col-4" name="brand_id" disabled>
                                    <option value="">انتخاب کنید</option>
                                </select>
                                <x-input-error :messages="$errors->get('brand_id')" class="error"/>
                            </div>
                        </div>

                        <div id="attribute-select"></div>

                        <div class="form-group">
                            <label>گارانتی</label>
                            <input type="text" class="form-control col-8" name="guarantee"
                                   value="{{ old('guarantee') }}">
                        </div>

                        <div class="form-group">
                            <label>وزن محصول (گرم)</label>
                            <input id="weight" type="text"
                                   class="form-control col-2 @error('weight') is-invalid @enderror" name="weight"
                                   value="{{ old('weight') }}">
                            <x-input-error :messages="$errors->get('weight')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>توضیحات</label>
                            <textarea id="introduction" name="introduction">{{ old('introduction') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>تصویر شاخص*</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                   value="">
                            <x-input-error :messages="$errors->get('image')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>موجودی*</label>
                            <input id="inventory" type="text"
                                   class="form-control col-2 @error('inventory') is-invalid @enderror" name="inventory"
                                   value="{{ old('inventory') }}">
                            <x-input-error :messages="$errors->get('inventory')" class="error"/>
                        </div>

                        <div id="color-select">
                            <div class="form-group">
                                <label>رنگ‌بندی</label>
                                <select name="colors[]" class="form-control col-4 select3" multiple>
                                    @foreach(\App\Models\Color::all() as $color)
                                        <option value="{{ $color->id }}"
                                                data-hex="{{ $color->hex }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                                        data-target="#create-color">رنگ دلخواه خود را بسازید
                                </button>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-md btn-warning col-2">
                                @if(isset($product))
                                    ویرایش محصول
                                @else
                                    ثبت محصول
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    @include('admin.product.brand-modal')
    @include('admin.product.color-modal')
    @include('admin.product.js-methods')

@endcomponent
