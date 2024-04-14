@component('admin.layouts.content')

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <style>
        .title {
            font-family: yekan-exbold;
            border-bottom: 1px solid #002fa0;
            color: #002fa0;
            margin-bottom: 50px;
        }

        .table tr:first-child {
            background-color: #ffc107;
        }

        .table .arrow {
            background: url('/images/down-arrow.png');
            width: 16px;
            height: 16px;
            display: inline-block;
            position: relative;
            top: 4px;
            transition: transform 0.3s ease-in-out;
        }

        .table .arrow.active {
            transform: rotate(180deg);
        }

        .review {
            display: none;
        }

        .review textarea {
            min-height: 400px;
        }

        .no-review {
            text-align: center;
        }

        .no-review i {
            background: url('/images/no-review.gif');
            width: 48px;
            height: 48px;
            display: inline-block;
            transform: scale(1.3);
        }

        .no-review p {
            font-family: yekan-exbold;
            text-align: center;
            margin-top: 15px;
            color: #009aac;
        }

        #new-review p {
            margin: 90px 0 20px 0;
            font-family: yekan-exbold;
            background-color: #3dd9eb;
            text-align: center;
            font-size: 14pt;
            border-radius: 3px;
            padding: 5px 0;
        }

        #new-review label {
            font-weight: 400 !important;
        }
    </style>

    <p class="title">نقد و بررسی‌های {{ $product->title }}</p>

    <div class="card-body table-responsive p-0 reviews-container">
        @if(count($reviews) != 0)
            <table class="table table-hover">
                <tbody>
                <tr>
                    <td>عنوان نقد و بررسی</td>
                    <td>اقدامات</td>
                </tr>
                @foreach($reviews as $review)
                    <tr class="review-title">
                        <td class="tt">{{ $review->title }}</td>
                        <td class="d-flex">
                            <a class="btn btn-sm btn-warning" onclick="showReview(this);">
                                متن کامل و ویرایش
                                <i class="arrow"></i>
                            </a>
                            <a class="btn btn-sm btn-danger mr-1 delete-review"
                               onclick="deleteAlert({{ $product->id }}, {{ $review->id }});">حذف</a>
                        </td>
                    </tr>
                    <tr class="review">
                        <td colspan="2">
                            <div class="form-group">
                                <input class="form-control" type="text" name="title" value="{{ $review->title }}">
                            </div>
                            <div class="form-group">
                                <textarea id="review" name="review"
                                          class="form-control">{{ $review->review }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="editReview({{ $review->id }}, this);">ویرایش
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="no-review">
                <i></i>
                <p>هنوز نقدی برای این محصول ثبت نشده است.</p>
            </div>
        @endif
    </div>

    <div id="new-review">

        <p>نقــد و بررســــی جدیــد</p>

        <form action="" method="post" id="review-form">
            @csrf
            <div class="form-group">
                <label>عنوان نقد</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                <x-input-error :messages="$errors->get('title')" class="error"/>
            </div>

            <div class="form-group">
                <label>متن نقد</label>
                <textarea name="review" class="form-control">{{ old('review') }}</textarea>
                <x-input-error :messages="$errors->get('review')" class="error"/>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-md btn-primary">ثبت نقد و بررسی</button>
            </div>
        </form>
    </div>

    <script>
        function showReview(tag) {
            $(tag).parents('.review-title').next().slideToggle();
            $(tag).find('.arrow').toggleClass('active');
        }

        function editReview(id, tag) {
            var reviewTag = $(tag).parents('.review');
            var reviewText = reviewTag.find('textarea');
            var reviewTitle = reviewTag.find('input[name=title]');
            $.ajax({
                type: 'PATCH',
                url: '/admin/product/review/' + id,
                data: {'review': reviewText.val(), 'title': reviewTitle.val()},
                success: function (msg) {
                    if (! Array.isArray(msg)) {
                        Swal.fire({
                            text: msg,
                            icon: 'warning',
                            confirmButtonColor: '#facea8',
                        })
                    } else {
                        $(tag).parents('.review').slideUp();
                        $(tag).parents('.review').prev().find('.tt').text(msg[1]);
                        reviewText.text(msg[0]);
                        Swal.fire({
                            text: "با موفقیت ویرایش شد.",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                        })
                    }
                }
            });
        }

        function deleteAlert(productID, reviewID) {

            Swal.fire({
                title: 'مطمئنید؟',
                text: "این نقد برای همیشه حذف خواهد شد!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteReview(productID, reviewID);
                }
            });
        }

        function deleteReview(productID, reviewID) {
            $.ajax({
                type: 'DELETE',
                url: '/admin/product/' + productID + '/review/' + reviewID,
                data: {},
                success: function (msg) {
                    if (msg.length === 0) {
                        var noReview = '<div class="no-review"><i></i><p>هنوز نقدی برای این محصول ثبت نشده است.</p></div>';
                        $('.reviews-container').html(noReview);

                    } else {
                        var reviews = '';
                        $.each(msg, function (index, review) {
                            reviews += '<tr class="review-title"><td>' + review['title'] + '</td><td class="d-flex"><a class="btn btn-sm btn-warning" onclick="showReview(this);">متن کامل و ویرایش</a><a class="btn btn-sm btn-danger mr-1" onclick="deleteReview(' + productID + ', ' + review['id'] + ');">حذف</a></td></tr><tr class="review"><td colspan="2"><div class="form-group"><textarea id="review" name="review" class="form-control">' + review['review'] + '</textarea></div><div class="form-group"><button type="button" class="btn btn-danger btn-sm" onclick="editReview(' + review['id'] + ', this);">ویرایش</button></div></td></tr>';
                        })

                        var tableTag = '<table class="table table-hover"><tbody><tr><td>عنوان نقد و بررسی</td><td>اقدامات</td></tr>' + reviews + '</tbody></table>';

                        $('.reviews-container').html(tableTag);
                    }
                }
            });
        }

    </script>

@endcomponent
