@component('layouts.content')

    <script src="/mCustomScrollbar/jquery.mCustomScrollbar.js"></script>
    <link href="/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

    <style>

        #main {
            width: 1140px;
            margin: 10px auto;
            background-color: #fff;
            padding: 20px 30px;
        }

        #main::after {
            content: " ";
            clear: both;
            display: block;
        }

        #sidebar {
            width: 250px;
            border: 1px solid #cecfce;
            float: right;
            padding: 1px 1px 20px 1px;
        }

        #content {
            width: 875px;
            float: left;
        }

        #navigation-bar {
            height: 30px;
            margin-right: 10px;
        }

        #navigation-bar > span {
            width: 6px;
            height: 6px;
            display: block;
            margin: 5px 5px 0 5px;
            background: url(/images/four-square.png);
            float: right;
        }

        #navigation-bar ul {
            float: right;
        }

        #navigation-bar ul li {
            font-size: 9pt;
            color: #5B5C5B;
            float: right;
            margin-left: 20px;
            cursor: pointer;
        }

        #navigation-bar li:hover {
            color: #f54606;
        }

        #navigation-bar li span {
            background: url(/images/slices.png) -276px -85px;
            width: 6px;
            height: 6px;
            display: inline-block;
            margin-right: 15px;
        }

        #content > .horizental-line {
            height: 1px;
            width: 100%;
            background-color: #cecfce;
            margin: 18px auto 20px auto;
            box-shadow: 0 -3px 50px 4px #949897;
            float: right;
        }

    </style>

    <div id="main">

        <form id="filter-form" method="post">

            <div id="sidebar">
                @include('search.sidebar')
            </div>

            <div id="content">
                <div id="navigation-bar">

                    <span></span>

                    <ul>
                        @if($parents)
                            @foreach($parents as $parent)
                                <li>
                                    {{ $parent->title }}
                                    <span></span>
                                </li>
                            @endforeach
                        @else
                            <li>
                                کلمه ی سرچ شده: {{ $keyword }}
                                <span></span>
                            </li>
                        @endif
                        <li>{{ $productsNumber }} نتیجه</li>
                    </ul>

                </div>
                @if($attributes)
                    @include('search.filter')
                @endif
                <div class="horizental-line"></div>

            @include('search.search-nav')
            @include('search.products')
        </form>

    </div>

    </div>

    <script>

        // display Type

        var displayType = $('#display-type');

        function linearDisplay(tag) {

            var thisTag = $(tag);

            $('#products').addClass('row-display');
            thisTag.addClass('active');
            displayType.find('.squares').removeClass('active');
        }

        function squareDisplay(tag) {

            var thisTag = $(tag);
            $('#products').removeClass('row-display');
            thisTag.addClass('active');
            displayType.find('.linear').removeClass('active');
        }

        var currentPage = 1;
        var paginationTag = $('#pagination ul');

        //TODO make a waiting box
        function doSearch(page) {

            if (typeof (page) == 'undefined') {
                currentPage = 1;
            } else {
                currentPage = page;
            }

            if (currentPage <= 1) {
                currentPage = 1;
                $('.prev-page').addClass('active');
            } else {
                $('.prev-page').removeClass('active');
            }


            var lastPage = paginationTag.find('li:last').data('value');
            if (currentPage >= lastPage) {
                currentPage = lastPage;
                $('.next-page').addClass('active');
            } else {
                $('.next-page').removeClass('active');
            }

            if ($('#available-show').hasClass('active')) {
                var available = 1;
            } else {
                available = 0;
            }

            var url = '/search/doSearch/' @if(request()->route()->getName() == 'category.search') + {{ $category->id }} @endif;
            var data = $('#filter-form').serializeArray();

            data.push({'name': 'currentPage', 'value': currentPage});
            data.push({'name': 'available', 'value': available});
            data.push({'name': 'keyword', 'value': '{{ $keyword }}'});

            $.post(url, data, function (msg) {

                var productsUl = $('#products').find('ul');
                productsUl.html('');

                $.each(msg[0], function (key, value) {

                    var enTitle = '';
                    if (value['en_title']) {
                        enTitle = value['en_title'];
                    }

                    var colors = '';
                    $.each(value['colors'], function (index, color) {
                        colors += '<span style="background-color: #' + color['hex'] + ';"></span> ';
                    });

                    var productTagScore = '';
                    if (value['score']) {
                        productTagScore = '<div class="rating"><div class="rate-text"><p class="text"> امتیاز کاربران ( از ' + value['comments'].length + ' رای )</p><p class="number">' + value['score'] + '</p></div><span class="gray-stars"><span class="red-stars" style="width: ' + (value['score'] + 0.1) / 5 * 100 + '%;"></span></span></div>';
                    }

                    var productAttribute = '';
                    $.each(value['attributes'], function (index, attribute) {
                        productAttribute += '<p>' + attribute['title'] + ' : ' + attribute['value'] + '</p>';
                    });

                    var productPrice = '';
                    if (value['discount']) {
                        productPrice = '<del>' + value['price'] + '</del><p class="off">' + value['discounted_price'] + '</p>';
                    } else {
                        productPrice = '<p class="off">' + value['price'] + '</p>';
                    }

                    //TODO set products Url
                    productTag = '<li class="active"><a href="/product/' + value['id'] + '"><div class="right"><div class="image"><img src="/images/products/' + value['id'] + '/product-' + value['id'] + '.jpg"></div><div class="colors">' + colors + '</div>' + productTagScore + '</div><div class="left"><div class="title"><p class="english">' + enTitle + '</p><p class="persian">' + value['title'] + '</p></div><div class="description">' + productAttribute + '</div><div class="price">' + itpro(productPrice) + '</div><i class="cart-icon"></i><div class="details-icon"><span class="icon"><i></i><i></i><i></i></span><span class="text">جزئیات محصول</span></div></div></a></li>';

                    $('#products').find('ul').append(productTag);
                })

                paginationTag.html('');
                pagination(msg[1], currentPage);

            }, 'json');
        }

        function appendPageNumber(number) {
            var active = '';
            if (number === currentPage) {
                active = 'active';
            } else {
                active = '';
            }
            paginationTag.append('<li class="' + active + ' pagination-item" data-value="' + number + '" onclick="doSearch(' + number + ');">' + number + '</li>');
        }

        function appendDots() {
            paginationTag.append('<li>...</li>');
        }

        function pagination(number, currentPage) {
            if (number <= 4) {
                for (var i = 1; i <= number; i++) {
                    appendPageNumber(i);
                }
            } else {
                if (currentPage <= 3) {
                    for (var i = 1; i <= currentPage + 1; i++) {
                        appendPageNumber(i);
                    }
                    appendDots();
                    appendPageNumber(number);
                } else if (currentPage >= (number - 2)) {
                    appendPageNumber(1);
                    appendDots();
                    for (var i = currentPage - 1; i <= number; i++) {
                        appendPageNumber(i);
                    }
                } else {
                    appendPageNumber(1);
                    appendDots();
                    for (var i = currentPage - 1; i <= currentPage + 1; i++) {
                        appendPageNumber(i);
                    }
                    appendDots();
                    appendPageNumber(number);
                }

            }
        }

        doSearch();

    </script>
@endcomponent
