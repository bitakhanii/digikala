@component('admin.layouts.content')

    <style>
        tr:first-child td {
            font-family: yekan-exbold;
        }

        .table td, .table th {
            padding: 20px !important;
        }

        .table tr:first-child {
            background-color: #ffc107;
        }

        .table tr:nth-child(even) {
            background-color: #f0ecf6;
        }

        .amazing {
            margin: 0;
            font-size: 9pt;
            color: #ea2e30;
            font-family: yekan-exbold;
            position: absolute;
            right: 5px;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول محصولات</h3>

                    <div class="card-tools d-flex">

                        @can('create-product')
                            <div class="btn-group-sm ml-2">
                                <a href="{{ route('admin.product.create') }}" class="btn btn-info btn-sm">ایجاد محصول
                                    جدید</a>
                            </div>
                        @endcan

                        <form action="">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="product_search" class="form-control float-right"
                                       placeholder="جستجو در نام محصول، دسته‌بندی، برند"
                                       value="{{ request()->product_search }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>عنوان</td>
                            <td>قیمت</td>
                            <td>تخفیف (درصد)</td>
                            <td>دسته‌بندی</td>
                            <td>برند</td>
                            <td>موجودی</td>
                            <td>بازدید</td>
                            <td>عملیات‌ها</td>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <p style="margin: 0;">{{ $product->id }}</p>
                                    @if($product->special_time > time())
                                        <p class="amazing">شگفتـــ‌ انگیـز</p>
                                    @endif
                                </td>
                                <td>{{ $product->title }}
                                    @if(\Carbon\Carbon::parse($product->created_at)->addDay() > now())
                                        <span class="badge badge-primary">جدید</span>
                                    @endif
                                </td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>{{ $product->discount }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>@if($product->brand)
                                        {{ $product->brand->name }}
                                    @else
                                        -
                                    @endif</td>
                                <td>{{ number_format($product->inventory) }}</td>
                                <td>{{ number_format($product->views) }}</td>
                                <td class="d-flex">
                                    @can('edit-product', $product->user)
                                        <a class="btn btn-sm btn-success"
                                           href="{{ route('admin.product.edit', $product->id) }}">ویرایش</a>
                                    @elsecan('details-product', $product->user)
                                        <a class="btn btn-sm btn-success"
                                           href="{{ route('admin.product.edit', $product->id) }}">جزئیات</a>
                                    @endcan
                                    @can('gallery-product', $product->user)
                                        <a class="btn btn-sm btn-danger mr-1"
                                           href="{{ route('admin.product.gallery', $product->id) }}">گالری</a>
                                    @endcan
                                    @can('review-product', $product->user)
                                        <a class="btn btn-sm btn-warning mr-1"
                                           href="{{ route('admin.product.review', $product->id) }}">نقد و بررسی</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    @include('admin.layouts.pagination', ['paginated' => $products])
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent
