<style>

    #introduction {
        box-shadow: 0 1px 2px 1px #d8d8d8;
        width: 100%;
        float: right;
        margin-top: 15px;
        overflow: hidden;
        border-radius: 3px;
        background-color: #fff;
    }

    #introduction .text {
        width: 1164px;
        float: right;
        padding: 10px 18px;
        background-color: #fff;
        border-radius: 3px;
        max-height: 400px;
        overflow: hidden;
        box-shadow: 0 -55px 10px -8px #fff inset;
    }

    #introduction .text.active {
        height: auto;
        max-height: unset;
    }

    #introduction .text h3 {
        font-size: 14pt;
        font-weight: normal;
        color: #474747;
        margin: 12px 0 25px 0;
    }

    #introduction .title {
        font-size: 10pt;
        color: #9c9c9c;
        margin: 0;
    }

    #introduction p {
        font-size: 10pt;
        color: #4E4E4E;
        margin: 40px 0 0 0;
        line-height: 40px;
        float: right;
        text-align: justify;
    }

    #introduction .show-more {
        float: right;
        width: 100%;
        height: 50px;
        background-color: #fff;
        cursor: pointer;
        text-align: center;
        box-shadow: 0 -55px 70px 25px #fff;
        margin-top: 60px;
    }

    #introduction .show-more.active {
        box-shadow: none;
    }

    #introduction .show-more i {
        width: 8px;
        height: 8px;
        display: inline-block;
        background: url(/images/slices.png) -36px -727px;
        margin-left: 6px;
    }

    #introduction .show-more.active i {
        transform: rotate(180deg);
    }

    #introduction .show-more span {
        font-size: 9.8pt;
        color: #4E4E4E;
        line-height: 48px;
    }

</style>

<div id="introduction">

    <div class="text">

        <h3>
            معرفی اجمالی محصول
        </h3>

        <p class="title">
            {{ $product->title }}
        </p>

        <p class="explanation">
            {!! $product->introduction !!}
        </p>

    </div>

    <div class="show-more">
        <i></i>
        <span>نمایش بیشتر</span>
    </div>

</div>

<script>

    /*Introduction*/

    var introduction = $('#introduction');
    var introShowMore = introduction.find('.show-more');

    introShowMore.click(function () {

        introduction.find('.text').toggleClass('active');
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            introShowMore.find('span').text('نمایش کمتر');
        } else {
            introShowMore.find('span').text('نمایش بیشتر');
        }
    });

    var textHeight = introduction.find('.text').css('height');
    if (textHeight <= '395px') {
        introShowMore.remove();
    }

</script>
