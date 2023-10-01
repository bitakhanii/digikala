<style>

    #details .features {
        width: 700px;
        float: left;
    }

    .features .title {
        width: 670px;
        background-color: #f4f4f4;
        border-radius: 3px;
        padding: 15px;
        float: left;
    }

    .features .title .name {
        width: 80%;
        float: right;
    }

    .features .title h2 {
        font-size: 11pt;
        font-weight: normal;
        font-family: yekan-exbold;
        color: #454545;
    }

    .features .title .name p {
        margin: 5px 0 0 0;
        font-size: 10pt;
        color: #949494;
    }

    .features .title .rate {
        width: 100px;
        float: left;
    }

    .features .stars .gray-stars {
        width: 100px;
        height: 20px;
        display: block;
        background: url(/images/star-gray.png) repeat;
    }

    .features .stars .gold-stars {
        height: 20px;
        display: block;
        background: url(/images/star-gold.png);
        float: left;
    }

    .features .title .rate p {
        font-size: 9pt;
        color: #949494;
        margin: 15px 0 0 0;
        text-align: center;
    }

    .features .right {
        width: 55%;
        float: right;
        margin-top: 25px;
    }

    .features .right h4 {
        font-size: 10pt;
        margin: 0;
        color: #838383;
        font-weight: normal;
    }

    .features .right .colors {
        width: 100%;
        float: right;
    }

    .features .colors ul {
        margin: 10px 0 20px 0;
        float: right;
        width: 100%;
    }

    .features .colors li {
        border: 1px solid #e7e7e7;
        float: right;
        margin: 0 0 8px 10px;
        padding: 5px 8px;
        border-radius: 2px;
        cursor: pointer;
    }

    .features .colors li.active {
        border: 1px solid #dadada;
        background-color: #f6fbf9;
    }

    .features .colors li span, .colors img {
        width: 18px;
        height: 18px;
        display: block;
        border-radius: 100%;
        border: 2px solid #c0c0c0;
        float: right;
        margin-right: 2px;
        position: relative;
    }

    .features .colors li.active span::after, .colors li.active img::after {
        content: " ";
        display: block;
        width: 11px;
        height: 11px;
        background: url(/images/slices.png) -171px -80px;
        position: absolute;
        top: 1px;
        right: 2px;
    }

    .features .colors li p {
        margin: 0 7px 0 0;
        float: right;
        font-size: 9pt;
        color: #838383;
        line-height: 22px;
    }

    .features .price {
        width: 100%;
        height: 50px;
        float: right;
        margin-top: 30px;
    }

    .features .price > p {
        color: #646464;
        margin: 0;
        font-size: 9pt;
        float: right;
    }

    .features .price del {
        font-size: 10pt;
        color: #979797;
        margin: 0 10px;
        font-weight: bold;
        float: right;
    }

    .features .price .toman {
        font-size: 8.3pt;
        color: #979797;
        float: right;
    }

    .features .price .off-box {
        height: 24px;
        display: inline-block;
        margin: -4px 20px 0 0;
        color: #fff;
        font-size: 8pt;
    }

    .features .price .off-box .text::before {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 5px 5px 5px 0;
        border-color: transparent #ffffff transparent transparent;
        position: absolute;
        top: 7px;
        right: 0;
    }

    .features .price .off-box .text {
        width: 30px;
        height: 18px;
        background-color: #fc6d6d;
        float: right;
        position: relative;
        padding: 5px 14px 1px 11px;
    }

    .features .price .off-box .num {
        padding: 0 12px;
        height: 100%;
        float: right;
        background-color: #f55555;
        border-radius: 2px 0 0 2px;
        text-align: center;
        line-height: 25px;
    }

    .features .price-off {
        width: 100%;
        height: 50px;
        float: right;
    }

    .features .price-off i {
        width: 28px;
        height: 28px;
        display: block;
        background: url(/images/slices.png) -404px -25px;
        border: 1px solid #dadada;
        float: right;
    }

    .features .price-off p {
        margin: 0 12px 0 25px;
        font-size: 12.5pt;
        color: #3F3F3F;
        float: right;
        line-height: 35px;
    }

    .features .price-off .num {
        font-size: 14pt;
        color: #05a705;
        float: right;
        font-weight: bold;
        line-height: 38px;
    }

    .features .price-off .toman {
        font-size: 9pt;
        color: #05a705;
        float: right;
        line-height: 38px;
        margin-right: 8px;
    }

    #buttons {
        width: 100%;
        height: 60px;
        float: right;
        color: #fff;
        margin-top: 10px;
    }

    #buttons .add-to-cart {
        height: 40px;
        display: block;
        float: right;
        border-radius: 2px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 2px 3px #e0e0e0;
    }

    #buttons span {
        text-align: center;
        line-height: 36px;
        font-size: 10.5pt;
        height: 100%;
    }

    #buttons a {
        color: #fff;
    }

    #buttons .add-to-cart {
        width: 210px;
    }

    #buttons .add-to-cart i {
        width: 26%;
        height: 100%;
        background: #65b565 url(/images/slices.png) -144px -412px;
        float: right;
    }

    #buttons .add-to-cart span {
        width: 74%;
        float: left;
        background-color: #549a54;
    }

    .features .left {
        width: 38%;
        float: left;
        margin-top: 30px;
        position: relative;
        height: 380px;
    }

    .features .left ul {
        float: left;
        width: 100%;
    }

    .features .left li {
        font-size: 8.2pt;
        width: 100%;
        float: left;
        margin-bottom: 15px;
    }

    .features .left li i {
        width: 5px;
        height: 8px;
        display: block;
        float: right;
        background: url(/images/slices.png) -570px -33px;
    }

    .features .left li p {
        margin: 0 18px 0 7px;
        color: #676767;
        float: right;
    }

    .features .left li span {
        float: right;
        color: #9E9E9E;
    }

    .features .show-more {
        cursor: pointer;
        float: right;
    }

    .features .show-more i {
        width: 8px;
        height: 8px;
        float: right;
        background: url(/images/slices.png) -173px -132px;
    }

    .features .show-more a {
        font-size: 8.2pt;
        color: #676767;
        border-bottom: 1px dotted #000;
        margin: -2px 16px 0 0;
        float: right;
    }

    .features .gift {
        width: 100%;
        position: absolute;
        bottom: 30px;
    }

    .features .gift i {
        width: 18px;
        height: 18px;
        float: right;
        background: url(/images/slices.png) -240px -29px;
        margin: 1px 0 0 10px;
    }

    .features .gift p {
        margin: 0;
        font-size: 10pt;
        color: #787878;
        float: right;
    }

    .features .gift .horizental-line {
        width: 100%;
        height: 1px;
        background: #e5e5e5;
        float: right;
        margin: 5px 0 12px 0;
    }

    .features .gift span {
        font-size: 9pt;
        color: #373737;
        float: right;
    }

    #service-features {
        width: 100%;
        height: 70px;
        background-color: #fff;
        float: right;
        border-top: 1px solid #D9D9D9;
        margin-top: 25px;
    }

    #service-features ul {
        height: 100%;
        padding: 0;
        margin: 0;
    }

    #service-features ul li {
        height: 100%;
        float: right;
        margin-left: 7px;
        color: #5b5b5b;
        font-size: 9pt;
        line-height: 68px;
        text-align: center;
    }

    #service-features ul li i {
        width: 25px;
        height: 25px;
        display: inline-block;
        background: url(/images/slices.png);
        vertical-align: middle;
        margin-left: 4px;
    }

</style>

<div class="features">

    <div class="title">

        <div class="name">

            <h2>
                {{ $product->title }}
            </h2>

            <p>
                {{ $product->en_title }}
            </p>

        </div>

        @if($product->comments()->where('approved', 1)->count() > 0)
            <div class="rate">

                <div class="stars">
                <span class="gray-stars">
                    <span class="gold-stars" style="width: {{ (productScore($product->id)) / 5 * 100 }}%;"></span>
                </span>
                </div>

                <p>
                    {{ productScore($product->id) }} از {{ $product->comments()->where('approved', 1)->count() }} رأی
                </p>

            </div>
        @endif

    </div>

    <div class="right">

        @if($product->colors()->count() > 0)

            <h4>
                انتخاب رنگ
            </h4>

            <div class="colors">

                <ul>
                    @foreach($product->colors as $color)
                        <li data-id="{{ $color->id }}">
                            @if($color->hex == '')
                                <img src="/images/multicolor.png">
                            @else
                                <span style="background-color: {{ $color->hex }};"></span>
                            @endif

                            <p>{{ $color->name }}</p>
                        </li>
                    @endforeach
                </ul>

            </div>

        @endif

        @if($product->discount)
            <div class="price">
                <p>قیمت:</p>
                <del>{{ number_format($product->price) }}</del>
                <span class="toman">تومان</span>
                <div class="off-box">
                    <span class="text">تخفیف</span>
                    <span class="num">
                        {{ number_format($product->discount_amount).' تومان' }}
                    </span>
                </div>
            </div>
        @endif

        <div class="price-off">
            <i></i>
            <p>
                قیمت برای شما:
            </p>
            <span class="num">
                {{ number_format($product->final_price) }}
            </span>
            <span class="toman">تومان</span>
        </div>

        <div id="buttons">

            <span class="add-to-cart">
                <i></i>
                <span onclick="addToCart({{ $product->id }});">
                    <a>
                        افزودن به سبد خرید
                    </a>
                </span>
            </span>
        </div>

    </div>

    <div class="left">

        <ul>
            @foreach($product->attributes as $attribute)
                <li>
                    <i></i>
                    <p>{{ $attribute->title }}</p>
                    <span>{{ $attribute->pivot->value->value }}</span>
                </li>
            @endforeach

        </ul>

        @if($product->attributes()->count() > 5)
            <div class="show-more" onclick="showMoreAttributes();">
                <i></i>

                <a>
                    موارد بیشتر
                </a>
            </div>
        @endif

        <div class="gift">

            <i></i>

            <p>
                هدایای همراه این کالا
            </p>

            <div class="horizental-line"></div>

            <span>
                            سرویس ویژه دیجی کالا: 7 روز تضمین تعویض کالا
            </span>

        </div>

    </div>

    <div id="service-features">

        <ul>
            <li>
                <i style="background-position: -315px -473px; width: 38px;"></i>
                تحویل اکسپرس
            </li>

            <li>
                <i style="background-position: -263px -473px;"></i>
                پرداخت در محل
            </li>

            <li>
                <i style="background-position: -210px -473px;"></i>
                ۷ روز ضمانت بازگشت
            </li>

            <li>
                <i style="background-position: -158px -473px;"></i>
                ضمانت اصل بودن کالا
            </li>

            <li>
                <i style="background-position: -104px -473px;"></i>
                تضمین بهترین قیمت
            </li>
        </ul>

    </div>

</div>

<script>

    var warrantyID = '';

    /* Color Select */

    var colorItems = $('.features .colors li');

    colorItems.eq(0).addClass('active');
    colorItems.click(function () {

        colorItems.removeClass('active');
        $(this).addClass('active');
    });

    /*Warranty Select*/

    var warrantyTag = $('#warranty');
    var warrantyItems = warrantyTag.find('ul li');

    warrantyTag.click(function () {

        $('> ul', this).fadeToggle(300);
        $(this).toggleClass('active');
    });

    warrantyItems.click(function () {

        warrantyID = $(this).attr('data-id');
        var warrantyText = $(this).text();
        warrantyTag.find('p').text(warrantyText);
    });

    /*Add Product to Basket*/

    function addToCart(productID) {

        var colorID = $('.colors ul li.active').attr('data-id');

        var url = '/cart/put';
        var data = {'product_id': productID, 'color_id': colorID};

        $.post(url, data, function () {
            Swal.fire({
                position: 'top-start',
                icon: 'success',
                title: 'رفت تو سبد خرید!',
                showConfirmButton: false,
                timer: 3000,
            })
        })
    }

    function showMoreAttributes() {
        $('.technical').trigger('click');
        window.location = '/product/' + {{ $product->id }} + '#tab';
    }

</script>
