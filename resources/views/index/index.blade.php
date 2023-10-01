@component('layouts.content')

    <style>

        #main {
            width: 1200px;
            margin: 15px auto 100px auto;
        }

        #main::after {
            content: "";
            display: block;
            clear: both;
        }

        #main .banner {
            width: 100%;
            cursor: pointer;
            display: block;
        }

        #main .banner img {
            border-radius: 4px;
            width: 100%;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .2);
        }

        #content {
            width: 75%;
            float: left;
            margin-top: 10px;
        }

        .slider-scroll {
            width: 100%;
            height: 310px;
            background-color: #fff;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 5px #e3e7e3;
            margin-top: 12px;
            float: right;
        }

        .slider-scroll > .title {
            height: 40px;
            background-color: #f7f9fa;
            padding: 0 20px;
        }

        .slider-scroll > .title > p {
            margin: 0;
            float: right;
            font-family: yekan-exbold;
            font-size: 10.5pt;
            color: #6F6F6F;
            line-height: 38px;
        }

        .slider-scroll > .title span {
            float: left;
            color: #0085e4;
            line-height: 38px;
            cursor: pointer;
            font-size: 10pt;
        }

        .slider-scroll > .title .plus {
            padding: 1px 0 0 5px;
        }

        .sliderscroll-prev, .sliderscroll-next {
            width: 55px;
            height: 235px;
            margin-top: 10px;
            float: right;
            position: relative;
        }

        .slider-scroll .prev-icon, .next-icon, .prev-icon-gray, .next-icon-gray {
            width: 24px;
            height: 24px;
            display: block;
            position: absolute;
            top: 100px;
            cursor: pointer;
        }

        .sliderscroll-prev .prev-icon {
            background: url(/images/prev-black.png);
            right: 11px;
            z-index: 2;
        }

        .prev-icon-gray {
            background: url(/images/prev-gray.png);
            right: 11px;
        }

        .sliderscroll-next .next-icon {
            background: url(/images/next-black.png);
            right: 21px;
            z-index: 2;
        }

        .next-icon-gray {
            background: url(/images/next-gray.png);
            right: 21px;
            display: none;
        }

        .sliderscroll-next {
            border-right: 1px solid #ebf0eb;
            box-shadow: 4px 0 12px -5px #dad9db;
        }

        .sliderscroll-main {
            width: 780px;
            height: 270px;
            float: right;
            overflow: hidden;
        }

        .sliderscroll-main ul {
            height: 100%;
        }

        .sliderscroll-main ul li {
            width: 260px;
            height: 100%;
            float: right;
            position: relative;
        }

        .sliderscroll-main li a {
            cursor: pointer;
        }

        .sliderscroll-main .scroll-img {
            position: absolute;
            top: 10px;
            right: -50px;
            left: 0;
            margin: auto;
        }

        .sliderscroll-main .exclusive {
            position: absolute;
            top: 120px;
            right: -50px;
            left: 0;
            margin: auto;
        }

        .sliderscroll-main .name {
            position: absolute;
            top: 155px;
            left: 0;
            right: -50px;
            margin: auto;
            text-align: center;
            color: #404040;
            font-size: 8.5pt;
            width: 212px;
            line-height: 20px;
            font-family: yekan-bold;
        }

        .sliderscroll-main li a .price-off {
            width: 210px;
            font-size: 9pt;
            color: #9ea39e;
            text-align: center;
            position: absolute;
            bottom: 45px;
            left: 0;
            right: -50px;
            margin: auto;
            background-color: #f1f2f3;

        }

        .sliderscroll-main li a .price {
            position: absolute;
            bottom: 7px;
            font-size: 11pt;
            color: #40ae4d;
            right: 50px;
            font-family: yekan-exbold;
        }

        .sliderscroll-main li a .toman {
            font-size: 9pt;
            color: #40ae4d;
            margin-right: 15px;
            font-family: yekan-exbold;
        }

    </style>

    <div id="main">

        <a class="banner">
            <img src="{{ getSetting('banner') }}">
        </a>

        @include('layouts.sidebar')

        <div id="content">

            @include('index.slider')
            @include('index.service-features')
            @include('index.special-slider')
            @include('index.most-visited')
            @php
                $posters = getPosters(Route::currentRouteName() , 'center');
            @endphp
            @include('layouts.poster' , ['posters' => $posters])
            @include('index.best-sellers')
            @include('index.newests')

        </div>

    </div>

        <script>

            /*Slider Scroll*/

            function sliderScroll(direction, tag) {

                var sliderScroll = $(tag).parents('.slider-scroll');
                var sliderScrollUl = sliderScroll.find('ul');
                var sliderScrollItems = sliderScrollUl.find('li');
                var sliderScrollItemsNum = sliderScrollItems.length;
                var sliderScrollSlidesNum = Math.ceil(sliderScrollItemsNum / 3);
                var sliderScrollNext = sliderScroll.find('.sliderscroll-next');
                var sliderScrollPrev = sliderScroll.find('.sliderscroll-prev');
                var marginRightNew;

                var maxNegativeMarginRight = -(sliderScrollSlidesNum - 1) * 780;

                var ulWidth = sliderScrollItemsNum * 260;
                sliderScrollUl.css('width', ulWidth);

                var marginRightOld = sliderScrollUl.css('margin-right');
                marginRightOld = parseFloat(marginRightOld);

                if (direction == 'left') {

                    marginRightNew = marginRightOld - 780;
                    sliderScrollPrev.find('.prev-icon').fadeIn(0);
                }
                if (direction == 'right') {

                    marginRightNew = marginRightOld + 780;
                    sliderScrollNext.find('.next-icon').fadeIn(0);
                    sliderScrollNext.find('.next-icon-gray').fadeOut(0);
                }

                if (marginRightNew > 0) {
                    stop(sliderScroll('right'));
                }

                if (marginRightNew < maxNegativeMarginRight) {
                    stop(sliderScroll('left'));
                }

                if (marginRightNew == 0) {
                    sliderScrollPrev.find('.prev-icon').fadeOut(0);
                }

                if (marginRightNew == maxNegativeMarginRight) {
                    sliderScrollNext.find('.next-icon').fadeOut(0);
                    sliderScrollNext.find('.next-icon-gray').fadeIn(0);
                }

                sliderScrollUl.animate({'marginRight': marginRightNew}, 200);
            }

            function prev() {
                $('.slider-scroll .prev-icon').fadeOut(0);
            }

            prev();

        </script>

@endcomponent
