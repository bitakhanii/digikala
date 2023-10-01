@php
    $sliders = \App\Models\Slider::sliders();
@endphp

<style>

    #slider {
        height: 306px;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .3);
        -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, .3);
        position: relative;
    }

    #slider .next, .prev {
        width: 19px;
        height: 33px;
        display: block;
        background: url(/images/arrow-slider.png) no-repeat;
        position: absolute;
        top: 112px;
        cursor: pointer;
        z-index: 2;
    }

    #slider .next {
        left: 10px;
    }

    #slider .prev {
        right: 10px;
        background-position: 0 -33px;
    }

    #slider-img {
        width: 100%;
        height: 258px;
    }

    #slider-img .item {
        position: relative;
        left: 280px;
        display: none;
    }

    #slider-img .item img {
        width: 1465px;
    }

    #slider-navigator {
        width: 100%;
        height: 50px;
        background-color: rgba(66, 47, 117, 0.7);
        position: absolute;
    }

    #slider-navigator ul {
        height: 100%;
    }

    #slider-navigator ul li {
        width: 20%;
        height: 100%;
        float: right;
    }

    #slider-navigator ul li a {
        width: 100%;
        height: 100%;
        display: block;
        text-align: center;
        color: #fff;
        line-height: 48px;
        font-size: 9pt;
        cursor: pointer;
    }

    #slider-navigator ul li.active > a {
        background-color: #fff;
        color: rgba(66, 47, 117, 0.8);
        position: relative;
    }

    #slider-navigator ul li.active > a::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 11px 10px 11px;
        border-color: transparent transparent #ffffff transparent;
        position: absolute;
        top: -10px;
        right: 0;
        left: 0;
        margin: 0 auto;
    }

</style>


<div id="slider">

    <span class="prev" onclick="goToPrev();"></span>
    <span class="next" onclick="goToNext();"></span>

    <div id="slider-img">

        @foreach($sliders as $slider)
            <a class="item" href="{{ $slider->link }}">
                <img src="{{ $slider->image }}">
            </a>
        @endforeach

    </div>

    <div id="slider-navigator">
        <ul>

            @foreach($sliders as $slider)
                <li>
                    <a href="{{ $slider->link }}">{{ $slider->navigator }}</a>
                </li>
            @endforeach

        </ul>
    </div>

</div>

    <script>

        var sliderTag = $('#slider');
        var sliderIMG = $('#slider-img').find('.item');
        var sliderNav = $('#slider-navigator').find('li');
        var next = sliderTag.find('.next');
        var prev = sliderTag.find('.prev');
        var itemsNum = sliderIMG.length;
        var slide = 0;

        function slider() {

            if (slide > itemsNum - 1) {
                slide = 0;
            }
            if (slide < 0) {
                slide = itemsNum - 1;
            }

            sliderIMG.fadeOut(0);
            sliderIMG.eq(slide).fadeIn(100);
            sliderNav.removeClass('active');
            sliderNav.eq(slide).addClass('active');
            slide++;
        }

        slider();

        var sliderInterval = setInterval(slider, 3000);

        function goToNext() {
            slider();
            clearInterval(sliderInterval);
        }

        function goToPrev() {
            slide = slide - 2;
            slider();
            clearInterval(sliderInterval);
        }

        function goToSlide(index) {
            slide = index;
            slider();
        }

        sliderNav.hover(function () {

            var index = $(this).index();
            goToSlide(index);
            clearInterval(sliderInterval);

        }, function () {

        });

        sliderTag.mouseleave(function () {

            clearInterval(sliderInterval);
            sliderInterval = setInterval(slider, 3000);
        });

    </script>

