<script src="/js/methods.js"></script>

<style>

    #sidebar > h3 {
        color: #fff;
        padding: 5px 10px;
        background-color: #7b7c7b;
        font-weight: normal;
        font-size: 10pt;
        line-height: 25px;
        margin: 0;
        cursor: pointer;
    }

    #sidebar > h3 span {
        background: url(/images/slices.png) -442px -425px;
        height: 10px;
        width: 15px;
        display: block;
        float: left;
        margin-top: 6px;
    }

    #sidebar > h3 span.rotate {
        transform: rotate(180deg);
    }

    #sidebar ul {
        padding: 8px 10px 0 0;
    }

    #sidebar .sort {
        margin: 10px 0;
    }

    #sidebar .sort li {
        color: #737373;
        font-size: 10.5pt;
        margin-bottom: 10px;
    }

    #sidebar .sort li:first-child {
        color: #1f1f1f;
        font-size: 11pt;
    }

    #sidebar .sort li:nth-child(2) {
        padding-right: 20px;
    }

    #sidebar .sort li:nth-child(3) {
        padding-right: 40px;
    }

    #sidebar .sort li:nth-child(4) {
        padding-right: 60px;
    }

    #sidebar .sort li i {
        background: url(/images/slices.png) -276px -85px;
        width: 6px;
        height: 6px;
        display: inline-block;
        margin-left: 5px;
    }

    #sidebar .sort li a {
        cursor: pointer;
        color: inherit;
    }

    #sidebar .horizental-line {
        height: 1px;
        width: 88%;
        background-color: #cecfce;
        margin: 30px auto 18px auto;
    }

    .filter {
        padding: 8px 10px 0 0;
    }

    .filter ul {
        width: 215px;
        max-height: 125px;
        overflow-y: auto;
        margin-top: 15px;
    }

    .filter li {
        color: #7b7c7b;
        font-size: 9pt;
        margin-bottom: 10px;
        position: relative;
        float: right;
        width: 100%;
    }

    .filter li .english {
        float: left;
    }

    .filter li .persian {
        float: right;
    }

    .filter .check-box-sidebar {
        width: 18px;
        height: 18px;
        display: inline-block;
        background: url(/images/checkbox-medium.png) -1px -1px;
        cursor: pointer;
        float: right;
    }

    .check-box-sidebar.active {
        background: url(/images/checkbox-medium.png) -1px -31px !important;
    }

    .filter .check-box-sidebar input {
        position: relative;
        z-index: 2;
        cursor: pointer;
        width: 18px;
        height: 18px;
        display: none;
    }

    .filter li .color {
        width: 4px;
        height: 14px;
        display: block;
        float: right;
        margin: 2px 7px 0 7px;
    }

    .price-range {
        padding: 8px 10px 0 0;
    }

    #sidebar h4 {
        color: #383838;
        font-size: 10pt;
        font-weight: normal;
        margin: 0;
    }

    .price-range > div {
        margin: 15px 0 30px 0;
    }

    .price-range span {
        width: 25px;
        display: inline-block;
        color: #383838;
        font-size: 10pt;
    }

    .price-range input {
        outline: none;
        font-family: yekan-exbold;
        width: 160px;
        border: none;
        border-bottom: 1px solid #d5d5d5;
        text-align: left;
        color: #d72402;
    }

    .price-range .toman {
        color: #d72402;
        font-size: 8pt;
        margin: 0 8px 0 0;
    }

    .price-range .submit {
        padding: 5px 8px 5px 5px;
        font-size: 7.5pt;
        font-family: yekan-exbold;
        color: #fff;
        border-radius: 3px;
        background-color: #d72402;
        cursor: pointer;
        margin: auto;
        display: block;
    }

    .available {
        padding: 8px 10px 30px 0;
    }

    .mCSB_scrollTools {
        width: 7px;
    }

    .mCS-3d-thick-dark.mCSB_scrollTools .mCSB_draggerContainer {
        box-shadow: none;
        background-color: rgba(255, 255, 255, .1);
    }

    .mCSB_dragger_bar {
        width: 7px !important;
        background-image: none !important;
        box-shadow: none !important;
        right: -2px !important;
        background-color: #ff9595 !important;
        top: -2px !important;
    }

    .mCustomScrollBox {
        height: auto;
    }

    .irs--square .irs-bar {
        background-color: #d72402 !important;
    }

    .irs--square .irs-handle {
        border: 3px solid #d72402 !important;
    }

    .irs--square .irs-from, .irs--square .irs-to, .irs--square .irs-single {
        background-color: #d72402 !important;
        font-size: 10pt;
    }

</style>

@if($parents)
    <h3 onclick="@if($category->parent != 0) showParents(); @endif">{{ $category->title }} @if($category->parent != 0)
            <span></span>
        @endif</h3>


    <ul class="sort">

        @foreach($category->allParents() as $parent)
            <li>
                <i></i>
                <a href="{{ route('category.search', $parent->slug) }}">{{ $parent->title }}</a>
            </li>
        @endforeach

        @if($category->parent != 0)
            <div class="horizental-line"></div>
        @endif

    </ul>
@endif

@if($brands != collect())
    <div class="filter">

        <h4 class="title">
            بر اساس برند
        </h4>

        <ul>
            @foreach($brands as $brand)
                <li>
                    <span class="check-box-sidebar" onclick="customCheckbox(this); doSearch();">
                        <input type="checkbox" name="brands[]" value="{{ $brand->id }}">
                    </span>
                    <span class="persian">{{ $brand->name }}</span>
                    <span class="english">{{ $brand->en_name }}</span>
                </li>
            @endforeach
        </ul>

    </div>

    <div class="horizental-line"></div>
@endif

@if($colors != collect())
    <div class="filter">
        <h4 class="title">
            بر اساس رنگ
        </h4>

        <ul>
            @foreach($colors as $color)
                @php
                    $color = \App\Models\Color::query()->find($color);
                @endphp
                <li>
                    <span class="check-box-sidebar" onclick="customCheckbox(this); doSearch();">
                        <input type="checkbox" name="colors[]" value="{{ $color->id }}">
                    </span>

                    @if($color->name == 'سفید')
                        <span class="color"
                              style="background-color: {{ $color->hex }};border: 1px solid #D4D4D4;width: 3px;"></span>
                        {{ $color->name }}
                    @else
                        <span class="color" style="background-color: {{ $color->hex }};"></span>
                        {{ $color->name }}
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <div class="horizental-line"></div>
@endif

<div style="padding: 5px 20px;">
    <input type="text" id="price-slider" name="price-slider" value=""/>
</div>

<div class="price-range">
    <h4>محدوده قیمت</h4>
    <div>
        <span>از</span>
        <input type="text" id="min-price" value="{{ engToPersian(number_format($minPrice)) }}" disabled>
        <input type="hidden" id="min-price-hidden" value="{{ $minPrice }}" disabled>
        <span class="toman">تومان</span>
    </div>

    <div>
        <span>تا</span>
        <input type="text" id="max-price" value="{{ engToPersian(number_format($maxPrice)) }}" disabled>
        <input type="hidden" id="max-price-hidden" value="{{ $maxPrice }}" disabled>
        <span class="toman">تومان</span>
    </div>

    <span class="submit" onclick="doSearch();">اعمال</span>
</div>


<script>

    var sidebar = $('#sidebar');
    var minPriceTag = $('#min-price');
    var maxPriceTag = $('#max-price');

    function showParents() {
        sidebar.find('.sort').slideToggle(200);
        sidebar.find('h3 > span').toggleClass('rotate');
    }


    $('.filter ul').mCustomScrollbar({
        'theme': "3d-thick-dark"
    });


    /*Price Range Slider with ion.RangeSlider Plugin*/
    //TODO Make rangeSlider numbers persian
    $("#price-slider").ionRangeSlider({
        skin: "square",
        min: $('#min-price-hidden').val(),
        max: $('#max-price-hidden').val(),
        type: 'double',
        step: 10000,
        prefix: "تومان",
        prettify_separator: ',',
        prettify_enabled: true,
        onFinish: function (data) {
            var minPrice = data.from.toLocaleString('fa');
            minPriceTag.val(minPrice);
            var maxPrice = data.to.toLocaleString('fa');
            maxPriceTag.val(maxPrice);
        },
    });


    /*var persianMinPrice = replaceDigits(itpro(minPriceTag.val()));
    minPriceTag.val(persianMinPrice);

    var persianMaxPrice = replaceDigits(itpro(maxPriceTag.val()));
    maxPriceTag.val(persianMaxPrice);*/

</script>
