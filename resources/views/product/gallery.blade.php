<script src="/js/jquery.elevatezoom.js"></script>

<script src="/mCustomScrollbar/jquery.mCustomScrollbar.js"></script>
<link href="/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

<script src="/jsc3d/jsc3d.js"></script>
<script src="/jsc3d/jsc3d.touch.js"></script>
<script src="/jsc3d/jsc3d.webgl.js"></script>

<style>

    #details #product-images {
        width: 450px;
        float: right;
    }

    #details .pictures {
        width: 100%;
        text-align: center;
        float: right;
        margin-top: 50px;
    }

    #details .pictures > img {
        max-width: 350px;
        max-height: 350px;
        margin-bottom: 30px;
        cursor: pointer;
    }

    .zoomLens {
        border-color: #b3b3b3 !important;
    }

    .zoomWindow {
        border-radius: 8px;
        -webkit-box-shadow: 0 6px 8px -1px rgba(0, 0, 0, .3);
        box-shadow: 0 6px 8px -1px rgba(0, 0, 0, .3);
        border-top: 1px solid #eee !important;
    }

    #details .pictures > ul li {
        width: 82px;
        height: 82px;
        float: right;
        text-align: center;
        margin-right: 5px;
        border: 1px solid #e9e9e9;
        cursor: pointer;
        position: relative;
    }

    #details .pictures > ul li img {
        width: 80px;
        position: absolute;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    #details .pictures > ul li span {
        width: 20px;
        height: 6px;
        display: block;
        background: url(/images/slices.png) -570px -35px;
        margin: 38px 32px 0 0;
    }

    #product-gallery {
        width: 1000px;
        height: 800px;
        background-color: #fff;
        position: fixed;
        top: 40px;
        left: 0;
        right: 0;
        margin: auto;
        z-index: 101;
        display: none;
    }

    #product-gallery h4 {
        margin: 0;
        font-size: 10pt;
        font-weight: normal;
        background-color: #f3f3f3;
        padding: 0 15px;
        color: #4b4b4b;
        line-height: 50px;
    }

    #product-gallery h4 i {
        width: 28px;
        height: 28px;
        background: url(/images/slices.png) -134px -123px;
        float: left;
        border: 1px solid #d5d5d5;
        border-radius: 100%;
        margin-top: 10px;
        cursor: pointer;
    }

    #large-pic {
        width: 72%;
        float: right;
        height: 750px;
        position: relative;
        text-align: center;
    }

    #large-pic img {
        position: absolute;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        max-width: 650px;
        max-height: 650px;
    }

    #small-pic {
        width: 28%;
        height: 750px;
        float: left;
        overflow-y: auto;
    }

    #small-pic ul {
        padding: 0;
        margin: 0;
        width: 91%;
        height: 100%;
        border-right: 1px solid #e7e7e7;
        float: left;
    }

    #small-pic li {
        width: 100%;
        height: 180px;
        border-bottom: 1px solid #e6e6e6;
        text-align: center;
        cursor: pointer;
        position: relative;
    }

    #small-pic li.active::before {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 18px 0 18px 18px;
        border-color: transparent transparent transparent #e7e7e7;
        position: absolute;
        top: 72px;
        right: -19px;
    }

    #small-pic li.active::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 18px 0 18px 18px;
        border-color: transparent transparent transparent #fff;
        position: absolute;
        top: 72px;
        right: -17px;
    }

    #small-pic li img {
        opacity: .6;
        max-width: 165px;
        max-height: 165px;
        position: absolute;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    #small-pic li.active img {
        opacity: 1;
    }

    .no-scroll-body {
        overflow: hidden;
    }

    #mCSB_1_scrollbar_vertical {
        left: 10px !important;
        box-shadow: none !important;
        width: 7px;
        top: 15px !important;
        bottom: 5px !important;
    }

    #mCSB_1_dragger_vertical {
        height: 130px !important;
    }

    .mCSB_dragger_bar {
        width: 7px !important;
        background-image: none !important;
        box-shadow: none !important;
        right: -2px !important;
        background-color: #b6b6b6 !important;
        top: -2px !important;
    }

    #mCSB_1_container {
        margin-left: 0 !important;
    }

</style>

<div id="product-images">

    <div class="pictures">

        <img class="zoom-product" src="/images/products/{{ $product->id }}/product-{{ $product->id }}.jpg"
             data-zoom-image="/images/products/{{ $product->id }}/product-{{ $product->id }}.jpg">

        <ul class="thumbnail">
            @if(sizeof($product->images) >= 4)
                @php
                    $thumbnails = $product->images->slice(0, 4)
                @endphp
            @else
                @php
                    $thumbnails = $product->images
                @endphp
            @endif
            @foreach($thumbnails as $thumbnail)
                <li data-main-image="/images/products/{{ $product->id }}/gallery/{{ $thumbnail->image.'.jpg' }}">
                    <img src="/images/products/{{ $product->id }}/gallery/{{ $thumbnail->image.'.jpg' }}">
                </li>
            @endforeach

            @if(sizeof($product->images) >= 5)
                <li data-main-image="/images/products/{{ $product->id }}/gallery/{{ $product->images[4]['image'].'.jpg' }}">
                    <span></span>
                </li>
            @endif
        </ul>

        <div id="product-gallery">

            <h4>
                {{ $product->title }}
                <i class="close"></i>
            </h4>

            <div id="large-pic">
                <img class="main-img" src="">
            </div>

            <div id="small-pic">

                <ul>

                    @foreach($product->images as $image)
                        <li data-main-image="/images/products/{{ $product->id }}/gallery/{{ $image->image.'.jpg' }}">
                            <img src="/images/products/{{ $product->id }}/gallery/{{ $image->image.'.jpg' }}">
                        </li>
                    @endforeach

                </ul>

            </div>

        </div>

    </div>

</div>

<script>

    /*Zoom Product*/

    $('.zoom-product').elevateZoom({

        'zoomWindowOffetx': -1000,
        'zoomWindowOffety': -50,
        'zoomWindowWidth': 600,
        'zoomWindowHeight': 600,
        'lensFadeIn': true,
        'zoomWindowFadeIn': true,
        'borderSize': 0
    });

    /*product Gallery Show*/

    var productGallery = $('#product-gallery');
    var productGallerySmall = productGallery.find('#small-pic li');
    var productGalleryItems = productGallery.find('.main-img');

    function productImgShow(imageUrl, index) {

        if (imageUrl.length > 0) {

            productGalleryItems.attr('src', imageUrl);
            productGalleryItems.fadeIn(0);

        } else {
            productGalleryItems.fadeOut(0);
        }

        productGallerySmall.removeClass('active');
        productGallerySmall.eq(index).addClass('active');
    }

    $('.pictures li').click(function () {

        var index = $(this).index();
        var mainImageUrl = $(this).attr('data-main-image');
        productImgShow(mainImageUrl, index);

    });

    $('.pictures .thumbnail li').click(function () {

        $('#dark-layer').fadeIn(0);
        productGallery.fadeIn(0);
        $('html').addClass('no-scroll-body');

        var index = $(this).index();
        var mainImageUrl = $(this).attr('data-main-image');
        productImgShow(mainImageUrl, index);

    });

    /*Product Gallery Close*/

    productGallery.find('.close').click(function () {

        productGallery.fadeOut(100);
        $('#dark-layer').fadeOut(100);
        $('html').removeClass('no-scroll-body');
    });

    /*Product Gallery Scrollbar*/

    $('#small-pic ul').mCustomScrollbar({

        'theme': "3d-thick-dark",
        'autoHideScrollbar': true
    });

</script>
