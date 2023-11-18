@component('admin.layouts.content')
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

    <link rel="stylesheet" href="/cropperjs/cropper.css">
    <script src="/cropperjs/cropper.min.js"></script>
    <script src="/cropperjs/jquery-cropper.js"></script>

    <style>
        .title {
            font-family: yekan-exbold;
            border-bottom: 1px solid #002fa0;
            color: #002fa0;
            margin-bottom: 50px;
        }

        label {
            font-weight: 400 !important;
        }

        #gallery li {
            display: inline-block;
            margin-left: 30px;
        }

        #gallery .delete-image {
            width: 20px;
            height: 20px;
            display: inline-block;
            background: url('/images/slices.png') -264px -367px;
            position: relative;
            top: 30px;
            right: 2px;
            cursor: pointer;
        }

        #gallery img {
            max-height: 202px;
            border: 1px solid #cccccc;
            display: block;
        }

        #gallery-form {
            margin-top: 50px;
        }

    </style>

    <p class="title">گالری تصاویر {{ $product->title }}</p>

    <div id="gallery">
        <ul>
            @foreach($product->images as $image)
                <li>
                    <a class="delete-image" onclick="deleteImage({{ $product->id }}, {{ $image->id }});"></a>
                    <img src="/images/products/{{ $product->id }}/gallery/{{ $image->image }}.jpg">
                </li>
            @endforeach
        </ul>
    </div>

    <form action="" method="post" enctype="multipart/form-data" id="gallery-form">
        @csrf
        <div id="imagesSection"></div>

        <div class="form-group">
            <a onclick="openImageField();" class="btn btn-sm btn-warning">افزودن تصاویر بیشتر</a>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-md btn-primary">ثبت تصاویر</button>
        </div>
    </form>

    <script>

        function openImageField() {
            var imageSection = $('#imagesSection');
            var childrenNum = imageSection.children().length;
            var imageField = '<div class="image-field"><div class="form-group d-flex"><label for="image_label" class="ml-2 mt-3 control-label">تصویر</label><div class="input-group"><input type="text" class="form-control image_label" aria-label="Image" aria-describedby="button-image" dir="ltr"><div class="input-group-append"><button class="btn btn-outline-secondary button-image" type="button" onclick="fileInputClick(this);">انتخاب</button></div></div><input type="file" name="images[' + childrenNum + ']" id="file-input" style="display:none" onchange="setValue(this);"><button class="btn btn-sm btn-warning mr-2" onclick="deleteImageField(this);">حذف</button></div></div>';

            imageSection.append(imageField);
        }

        openImageField();

        function fileInputClick(tag) {
            $(tag).parents('.image-field').find('input[type=file]').click();
        }

        function setValue(input) {
            $(input).parents('.image-field').find('.image_label').val($(input).val().split('\\').pop().split('/').pop());
        }

        function deleteImageField(button) {
            $(button).closest('.image-field').remove();
        }

        function deleteImage(productID, imageID) {

            $.ajax({
                type: 'DELETE',
                url: '/admin/product/' + productID + '/productImage/' + imageID,
                data: {},
                success: function (msg) {
                    var imageTag = '';
                    $.each(msg, function (index, image) {
                        imageTag += '<li><a class="delete-image" onclick="deleteImage(' + productID + ', ' + image['id'] + ');"></a><img src="/images/products/' + productID + '/gallery/' + image['image'] + '.jpg"></li>';
                    })

                    $('#gallery ul').html(imageTag);
                }
            });
        }


    </script>
@endcomponent
