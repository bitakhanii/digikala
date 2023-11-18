@component('layouts.content')
    <style>

        #main {
            width: 1200px;
            margin: 12px auto;
        }

        #main::after {
            content: " ";
            display: block;
            clear: both;
        }

        #content {
            width: 100%;
            background-color: #fff;
            border-radius: 4px;
        }

        #details {
            width: 1170px;
            background-color: #fff;
            float: right;
            padding: 20px 15px 0 15px;
            box-shadow: 0 2px 1px 1px #e5e5e5;
            border-radius: 0 0 3px 3px;
        }

        #tab {
            padding: 0;
            margin: 12px 0 0 0;
            height: 70px;
            background-color: #f5f6f7;
            float: right;
            width: 100%;
            box-shadow: 0 1px 7px rgba(0, 0, 0, .12);
            border-radius: 3px 3px 0 0;
            overflow: hidden;
        }

        #tab li {
            height: 100%;
            float: right;
            border-left: 1px solid #e4e4e4;
            padding: 0 30px;
            font-family: yekan;
            cursor: pointer;
            color: #808591;
        }

        #tab li.active {
            background-color: #fff;
            border-top: 2px solid #2196F3;
            box-shadow: 0 -1px 3px #dadada;
            color: #2196F3;
            z-index: 2;
            position: relative;
        }

        #tab li i {
            width: 21px;
            height: 21px;
            background: url(/images/slices.png) -107px -268px;
            margin: 24px 0 0 20px;
            float: right;
        }

        #tab li.active i {
            background-position-y: -310px !important;
        }

        #tab li p {
            margin: 25px 0 0 0;
            font-size: 11pt;
            float: left;
        }

        #tab-window {
            float: right;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 1px 7px rgba(0, 0, 0, .12);
            border-radius: 0 0 3px 3px;
            overflow: hidden;
        }

        #tab-window section {
            display: none;
        }

    </style>

    <div id="main">

        <div id="navigation-bar">

            <ul>
                <li>
                    <a href="{{ route('index') }}">
                        فروشگاه اینترنتی دیجی کالا
                    </a>
                    <span></span>
                </li>

                @foreach($product->category->allParents() as $category)
                    <li>
                        <a href="{{ route('category.search', $category->slug) }}">
                            {{ $category->title }}
                        </a>
                        <span></span>
                    </li>
                @endforeach

                <li>
                    <a style="cursor: default;">
                        {{ $product->title }}
                    </a>
                </li>
            </ul>

        </div>

        <div id="content">

            @if($product->special_time > time())
                @include('product.amazing-offer')
            @endif

            <div id="details">
                @include('product.gallery')
                @include('product.features')
            </div>

            @if($product->introduction)
                @include('product.introduction')
            @endif

            <ul id="tab">
                @if($product->reviews()->count() > 0)
                    <li class="review">
                        <i></i>
                        <p>
                            نقد و بررسی تخصصی
                        </p>
                    </li>
                @endif

                <li class="technical">
                    <i style="background-position-x: -317px;"></i>
                    <p>
                        مشخصات
                    </p>
                </li>

                <li class="comments">
                    <i style="background-position-x: -263px;"></i>
                    <p>
                        نظرات کاربران
                    </p>
                </li>

                <li class="questions">
                    <i class="active" style="background-position-x: -212px;"></i>
                    <p>
                        پرسش و پاسخ
                    </p>
                </li>
            </ul>

            <div id="tab-window">
                @if($product->reviews()->count() > 0)
                    <section id="review"></section>
                @endif
                <section id="technical"></section>
                <section id="comments"></section>
                <section id="questions"></section>
            </div>

        </div>

    </div>

    <style>

        #dark-layer {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .5);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 5;
            display: none;
        }

    </style>

    <div id="dark-layer"></div>

    <script>

        /*Tab*/

        var tabItems = $('#tab').find('li');
        var tabWindows = $('#tab-window').find('section');

        function openTab(tag) {

            tabWindows.fadeOut(0);

            var index = tag.index();
            var selectedSection = tabWindows.eq(index);

            if (tabWindows.length === 3) {
                index = index + 1;
            }

            $.ajax({
                type: 'POST',
                url: '/product/activeTab/' + {{ $product->id }},
                data: {'index': index},
                success: function (msg) {
                    selectedSection.html(msg);
                }
            })


            /*$.post(url, data, function (msg) {
                selectedSection.html(msg);
            });*/

            selectedSection.fadeIn(100);

            tabItems.removeClass('active');
            tag.addClass('active');
        }

        tabItems.click(function () {

            openTab($(this));
        });

        $('.{{ $activeTab }}').trigger('click');

        /*Sort*/

        var sortIcon = $('.sort li');

        sortIcon.click(function () {

            sortIcon.removeClass('active');
            $(this).toggleClass('active');
        });

        /*Agree Checkbox*/

        $('#questions').find('.agree i').click(function () {

            $(this).toggleClass('active');
        });

    </script>
@endcomponent
