<?php
$specialProducts = \App\Models\Product::specialProducts();
?>

<style>

    #special-slider {
        width: 100%;
        height: 312px;
        background-color: #fff;
        margin-top: 12px;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 5px #e3e7e3;
        -webkit-box-shadow: 0 2px 5px #e3e7e3;
        position: relative;
    }

    #special-slider-navigator {
        width: 21%;
        height: 100%;
        float: left;
        border-right: 1px solid #eaebea;
        background-color: #f7f7f9;
    }

    #special-slider-navigator li {
        height: 12.5%;
        text-align: center;
        line-height: 37px;
        color: #535353;
        font-size: 9pt;
        cursor: pointer;
        font-family: yekan-bold;
    }

    #special-slider-navigator li.active {
        background-color: #f25732;
        color: #fff;
        position: relative;
    }

    #special-slider-navigator li.active a {
        font-family: yekan-bold;
    }

    #special-slider-navigator li.active::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 19.5px 0 19.5px 20px;
        border-color: transparent transparent transparent #f25732;
        position: absolute;
        right: -20px;
        z-index: 2;
    }

    #special-slider-content {
        width: 78%;
        height: 100%;
        float: right;
        z-index: 2;
    }

    #special-slider-content .item {
        width: 100%;
        height: 100%;
        display: block;
        background: url(/images/special-slider-bg.jpg);
        cursor: pointer;
    }

    .content-right {
        width: 60%;
        height: 100%;
        float: right;
        position: relative;
    }

    .content-right .price {
        height: 35px;
        margin: 60px 30px 0 0;
    }

    .content-right .old-price::before {
        content: " ";
        width: 82%;
        border: 1px solid #000;
        display: block;
        position: absolute;
        top: 17px;
        right: 0;
        left: 0;
        margin: auto;
        transform: rotate(-21deg);
    }

    .content-right .old-price {
        height: 100%;
        background-color: #908D8D;
        position: relative;
        float: right;
        color: #fff;
        font-size: 19pt;
        text-align: center;
        line-height: 40px;
        padding: 0 22px;
    }

    .content-right .old-price::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 9.5px 14px 9.5px 0;
        border-color: transparent #908d8d transparent transparent;
        position: absolute;
        left: -12px;
        top: 9px;
        z-index: 2;
    }

    .content-right .new-price {
        height: 100%;
        background-color: #f40000;
        float: right;
        margin-right: 2px;
        position: relative;
        color: #fff;
        font-size: 20pt;
        line-height: 40px;
        padding-right: 20px;
    }

    .content-right .new-price::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 9.5px 14px 9.5px 0;
        border-color: transparent #ffffff transparent transparent;
        position: absolute;
        right: 0;
        top: 9px;
    }

    .content-right .new-price p {
        margin: 0;
        color: #fff;
        float: left;
        font-size: 11pt;
        line-height: 35px;
        padding: 0 20px 0 10px;
    }

    .content-right .description {
        margin: 25px 27px 0 0;
    }

    .content-right .description p {
        font-size: 9.5pt;
        padding-bottom: 3px;
        color: #000;
        margin: 3px 0;
    }

    .content-left {
        width: 38%;
        height: 100%;
        text-align: center;
        float: right;
    }

    .content-left .title {
        height: 12%;
    }

    .content-left .image {
        height: 75%;
        display: flex;
        align-items: center;
    }

    .content-left p {
        font-size: 12pt;
        margin: 28px 0 0 0;
        color: #505051;
        text-align: center;
        font-family: yekan-exbold;
    }

    .content-left img {
        margin: 12px auto 0 auto;
        max-height: 100%;
        max-width: 100%;
    }

    #special-slider .timer-txt {
        font-family: yekan-bold;
        position: absolute;
        bottom: 84px;
        right: 26px;
        font-size: 9pt;
        color: #000;
    }

    #special-slider .flip-clock {
        width: 620px;
        position: absolute;
        left: 0;
        top: 180px;
        transform: scale(.32);
        z-index: 2;
    }

    .blur {
        filter: blur(2px);
    }

    .finish {
        background: url(/images/finish-timer.png);
        width: 220px;
        height: 220px;
        position: absolute;
        right: 20px;
        top: 115px;
        display: none;
        z-index: 7;
    }

    .finish span {
        position: relative;
        top: 94px;
        right: 70px;
        font-family: yekan-exbold;
        font-size: 14pt;
        color: #fff;
    }

</style>

<div id="special-slider">

    <div id="special-slider-navigator">

        <ul>
            @foreach($specialProducts as $product)
                <li>
                    <a>
                        {{ $product->nav_title }}
                    </a>
                </li>
            @endforeach
        </ul>

    </div>

    <div id="special-slider-content">
        @foreach($specialProducts as $product)
            <a class="item item-{{ $product->id }}" href="{{ route('product', $product->id) }}">

                <div class="finish">
                    <span>تمام شد!</span>
                </div>

                <div class="content-right" data-num="{{ $product->id }}">

                    <div class="price">

                        <div class="old-price">{{ $product->first_price }}</div>

                        <div class="new-price">
                            {{ $product->discounted_price }}
                            <p>{{ $product->unit }}</p>
                        </div>

                    </div>

                    <div class="description">
                        @if($product->attributes)
                            @foreach($product->attributes()->get()->take(3) as $attribute)
                                <p>{{ $attribute->title.' : '.$attribute->pivot->value->value }}</p>
                            @endforeach
                        @endif
                    </div>

                    @if($product->special_time > time() && $product->inventory > 0)
                        <span class="timer-txt">
                            فرصت باقی مانده تا این پیشنهاد
                        </span>

                        <div class="clock-{{ $product->id }} flip-clock" style="margin:2em;"></div>

                        <script>

                            $(document).ready(function () {
                                var targetTime = {{ $product->special_time }};
                                var currentTime = Math.floor(Date.now() / 1000);
                                var remainingTime = targetTime > currentTime ? targetTime - currentTime : 0;

                                var clocks = [];
                                clocks.push($('.clock-' + {{ $product->id }}).FlipClock(remainingTime, {
                                    clockFace: 'HourlyCounter',
                                    countdown: true,
                                    autoStart: true,
                                    callbacks: {
                                        interval: function () {
                                            $('.inn').persiaNumber();
                                        }
                                    }
                                }));
                                $('.flip-clock-label').remove();
                            });

                        </script>
                    @else
                        <script>
                            var item = $('#special-slider-content').find('a.item-' + {{ $product->id }});
                            item.find('.content-right').addClass('blur');
                            setTimeout(function () {
                                $('.left-' + {{ $product->id }}).addClass('blur');
                            }, 100);
                            item.find('.finish').fadeIn(0);
                        </script>
                    @endif

                </div>

                <div class="content-left left-{{ $product->id }}">

                    <div class="title">
                        <p>{{ $product->con_title }}</p>
                    </div>

                    <div class="image">
                        <img src="/images/products/{{ $product->id }}/product-{{ $product->id }}_220.jpg">
                    </div>

                </div>

            </a>
        @endforeach
    </div>

</div>


<script>

    /*Special Slider*/

    var spSliderTag = $('#special-slider');
    var spSliderNav = $('#special-slider-navigator').find('li');
    var spSliderCon = $('#special-slider-content').find('a');
    var spSliderItems = spSliderNav.length;
    var spSlide = 0;

    function specialSlider() {

        if (spSlide > spSliderItems - 1) {
            spSlide = 0;
        }

        if (spSlide < 0) {
            spSlide = spSliderItems - 1;
        }

        spSliderCon.fadeOut(100);
        spSliderCon.eq(spSlide).fadeIn(100);
        spSliderNav.removeClass('active');
        spSliderNav.eq(spSlide).addClass('active');
        spSlide++;
    }

    specialSlider();
    spSliderInterval = setInterval(specialSlider, 3500);

    function goTospSlide(index) {

        spSlide = index;
        specialSlider();
    }

    spSliderNav.click(function () {

        clearInterval(spSliderInterval);
        var index = $(this).index();
        goTospSlide(index);
    });

    spSliderTag.mouseleave(function () {

        clearInterval(spSliderInterval);
        spSliderInterval = setInterval(specialSlider, 5000);
    });

</script>
