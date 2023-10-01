<html lang="en">
<head>
    {{--<base href="<?= URL; ?>">--}}
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فروشگاه اینترنتی دیجی کالا</title>
    <link href="/css/style.css" rel="stylesheet">
    <script src="/js/methods.js"></script>
    <script src="/js/jquery-3.6.4.min.js"></script>
    {{--<script src="https://kit.fontawesome.com/0b80c696f5.js" crossorigin="anonymous"></script>--}}
    <script src="/inputLan/inputLan.js"></script>
    <script src="/js/toPersianNum/persianumber.min.js"></script>
    <script src="/js/persian.js"></script>
    <link href="/flipclock/css/flipclock.css" rel="stylesheet">
    <script src="/flipclock/js/flipclock.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="/ionRangeSlider/css/ion.rangeSlider.min.css" rel="stylesheet">
    <script src="/ionRangeSlider/js/ion.rangeSlider.min.js"></script>
    {{--<script src="public/rangeSlider/rangeslider.js"></script>
    <link href="public/rangeSlider/rangeslider.css" rel="stylesheet">--}}
</head>
<body style="background-color: #{{ getSetting('body-color') }}; margin: 0;" class="fa-num">

<style>

    #navigation-bar {
        background-color: #fafcfc;
        border-radius: 4px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, .04);
        padding: 10px 15px;
    }

    #navigation-bar .four {
        width: 6px;
        height: 6px;
        display: inline-block;
        margin-left: 10px;
        background: url(/images/four-square.png);
    }

    #navigation-bar ul {
        display: inline-block;
    }

    #navigation-bar ul li {
        float: right;
        margin: 0 0 0 20px;
        font-size: 8.2pt;
        color: #5B5C5B;
    }

    #navigation-bar li a {
        cursor: pointer;
        color: #5B5C5B;
    }

    #navigation-bar li a:hover {
        color: #f54606;
    }

    #navigation-bar li span {
        background: url(/images/slices.png) -276px -85px;
        width: 6px;
        height: 6px;
        display: inline-block;
        margin-right: 15px;
    }

    .buy-steps {
        background-color: #fefefa;
        padding: 25px 0;
        float: right;
        width: 100%;
    }

    .buy-steps .dash {
        float: right;
        margin: 13px 110px 0 10px;
    }

    .buy-steps .dash:last-child {
        margin-right: -17px;
    }

    .buy-steps .dash span {
        width: 14px;
        height: 2px;
        float: right;
        background-color: #cfd4d7;
        margin-left: 5px;
    }

    .buy-steps .dash.active span {
        background-color: #22be23;
    }

    .buy-steps ul {
        padding: 0;
        margin: 0;
        float: right;
    }

    .buy-steps li {
        float: right;
        margin-left: 10px;
    }

    .buy-steps li span {
        width: 18px;
        height: 18px;
        float: right;
        border: 3px solid #cfd4d7;
        border-radius: 100%;
    }

    .buy-steps li.half-active span {
        border: 3px solid #22be23;
        background: #e4ffe7;
    }

    .buy-steps li.active span {
        background: #22be23 url(/images/slices.png) -810px -475px;
        border: 3px solid #22be23;
    }

    .buy-steps li div {
        width: 210px;
        height: 2px;
        background-color: #cfd4d7;
        float: right;
        margin: 13px 10px 0 0;
    }

    .buy-steps li div.active {
        background-color: #22be23;
    }

    .buy-steps li p {
        font-size: 11pt;
        color: #8A8C94;
        margin: 35px -35px 0 0;
    }

    .buy-steps li p.active {
        color: #23b224;
    }

    .buy-steps li:nth-child(2) p {
        margin-right: -55px;
    }

    .buy-steps li:nth-child(3) p {
        margin-right: -32px;
    }

    header {
        background-color: #fff;
        width: 100%;
    }

    #header {
        width: 1200px;
        height: 100px;
        margin: 0 auto;
        padding-top: 15px;
    }

    #header-right {
        float: right;
    }

    #header-right-top {
        height: 40px;
    }

    #header-right-top * {
        float: right;
        font-size: 10pt;
    }

    #header-right-top .login-icon, .register-icon {
        width: 16px;
        height: 16px;
        background: url(/images/slices.png);
        background-position: -310px -30px;
        display: block;
        margin: 0 0 0 10px;
    }

    #header-right-top .text {
        color: #9ea59b;
    }

    #header-right-top .login {
        color: #808390;
        margin-right: 3px;
    }

    #header-right-top .login:hover {
        color: #ef3f3e;
        transition: 0.1s;
        -webkit-transition: 0.1s;
    }

    #header-right-top .register:hover {
        color: #ef3f3e;
        transition: 0.1s;
        -webkit-transition: 0.1s;
    }

    #header-right-top .register-icon {
        background-position: -274px -32px;
        margin: 0 40px 0 8px;
    }

    #header-right-top .register {
        color: #808390;
    }

    #header-right-top .logged-in, #header-right-top .logout {
        cursor: pointer;
        padding: 6px 12px;
        background-color: #86a490;
        border-radius: 3px;
        margin-left: 15px;
    }

    #header-right-top .logout {
        background-color: #d1bebe;
    }

    #header-right-top .logout form {
        margin: 0;
    }

    #header-right-top .logged-in i {
        font-size: 11pt;
        color: #fff;
        margin-left: 10px;
    }

    #header-right-top .logged-in span, #header-right-top .logout span {
        color: #fff;
        font-family: yekan-bold;
        font-size: 8pt;
    }

    #header-right-bottom {
        height: 50px;
        font-size: 10.2pt;
    }

    #header-right-bottom .shopping-basket {
        width: 190px;
        height: 40px;
        float: right;
        border-radius: 3px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 1px 6px #D0D1D0;
        -moz-box-shadow: 0 1px 6px #D0D1D0;
        -o-box-shadow: 0 1px 6px #D0D1D0;
        -webkit-box-shadow: 0 1px 6px #D0D1D0;
    }

    .shopping-basket .icon {
        width: 54px;
        height: 100%;
        background: url(/images/slices.png) no-repeat center #36c55d;
        background-position: -197px -411px;
        float: right;
    }

    .shopping-basket .number {
        width: 86px;
        height: 100%;
        float: right;
        background: #3dad5e;
        padding: 0 25px;
        line-height: 32px;
    }

    .shopping-basket .number .text {
        color: #fff;
        display: inline-block;
        margin-top: 3px;
    }

    .shopping-basket .number .circle {
        width: 23px;
        height: 23px;
        background-color: #35BA5C;
        display: block;
        float: left;
        margin-top: 8px;
        text-align: center;
        line-height: 22px;
        border-radius: 100%;
        color: #fff;
        font-size: 10pt;
    }

    #search {
        width: 600px;
        height: 40px;
        float: right;
        margin-right: 15px;
        position: relative;
    }

    #search input {
        width: 480px;
        height: 40px;
        border: 1px solid #dedee2;
        box-shadow: 0 0 3px 1px inset #eee;
        -webkit-box-shadow: 0 0 3px 1px inset #eee;
        color: #969698;
        padding-right: 15px;
        border-radius: 2px;
        font-family: yekan-bold;
        outline: none;
    }

    #search input[type=text]:focus {
        border: 1px solid rgba(0, 0, 0, 0.18);
        box-shadow: 0 0 3px 1px inset rgb(206, 206, 206);
        -webkit-box-shadow: 0 0 3px 1px inset rgb(206, 206, 206);
        transition: 0.2s;
        -webkit-transition: 0.2s;
    }

    #search .search-icon {
        width: 42px;
        height: 40px;
        background: url(/images/slices.png) no-repeat center #b7b6bd;
        background-position: -446px -20px;
        display: block;
        position: absolute;
        top: 0;
        left: 101px;
        border-radius: 2px 0 0 2px;
        cursor: pointer;
    }

    #header-left {
        float: left;
        margin-top: 10px;
    }

    #header-left a {
        display: inline-block;
    }

    nav {
        width: 100%;
        height: 40px;
        background: #{{ getSetting('nav-color') }};
        box-shadow: 0 2px 3px #dfdde6;
        -webkit-box-shadow: 0 2px 3px #dfdde6;
        -moz-box-shadow: 0 2px 3px #dfdde6;
        border-top: 1px solid #f5f5f7;
    }

    #menu {
        width: 1200px;
        height: 100%;
        margin: auto;
        z-index: 100;
        position: relative;
    }

    #menu * {
        z-index: 100;
    }

    #menu ul {
        margin: 0;
        padding: 0;
    }

    #menu a {
        cursor: pointer;
    }

    #menu > ul {
        position: relative;
    }

    #menu > ul > li {
        float: right;
        height: 40px;
        font-size: 9pt;
    }

    #menu > ul > li > a {
        padding: 0 14px;
        height: 100%;
        display: block;
        line-height: 38px;
        color: #5b5b5b;
        font-family: yekan-bold;
    }

    #menu .down-icon-menu {
        width: 8px;
        height: 8px;
        background: url(/images/slices.png) -36px -729px;
        float: left;
        margin: 16px 12px 0 0;
    }

    .up-icon-menu {
        width: 8px;
        height: 8px;
        background: url(/images/slices.png);
        background-position: -36px -705px;
        display: block;
        float: left;
        margin: 16px 12px 0 0;
    }

    #menu > ul > li > ul {
        position: absolute;
        right: 0;
        background-color: #fff;
        width: 1200px;
        box-shadow: 0 2px 3px #c1bfc7;
        border-top: 1px solid #e5e6e7;
        z-index: 1;
        display: none;
    }

    #menu > ul > li > ul > li {
        float: right;
        width: 240px;
    }

    #menu > ul > li > ul > li > a {
        padding: 10px 25px;
        color: #5b5b5b;
        display: block;
        font-size: 9pt;
        text-align: center;
    }

    #menu .submenu3 {
        width: 1200px;
        height: 300px;
        background-color: #fff;
        position: absolute;
        border-top: 1px solid #d7d7d9;
        right: 0;
        box-shadow: 0 2px 3px #c1bfc7;
        z-index: 1;
        display: none;
    }

    #menu .submenu3 img {
        position: absolute;
        bottom: 20px;
        left: 20px;
    }

    #menu .colmenu3 {
        width: 299px;
        float: right;
        border-left: 1px solid #e7e7e9;
        height: 100%;
    }

    #menu .colmenu3:nth-child(4) {
        width: 300px;
        border-left: none;
    }

    .colmenu3 li {
        padding: 10px 35px 0 0;
        font-size: 9.2pt;
        color: #727272;
    }

    .colmenu3 li:last-child {
        padding: 10px 35px 10px 0;
    }

    .colmenu3 li a {
        color: #727272;
    }

    .submenu3 > img {
        position: absolute;
        left: 15px;
        bottom: 0;
    }

    .menu1 > li.active > a {
        color: #f45855 !important;
        background-color: #ffffff;
        box-shadow: 0 0 2px #d4d4d4;
    }

    .menu2 > li.active > a {
        color: #f45855 !important;
        border-bottom: 2px solid red;
        position: relative;
    }

    .menu2 > li.active > a::before {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 6px 6px 6px;
        border-color: transparent transparent #ff0000 transparent;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

    .submenu3 li:hover a {
        color: #f45855;
        transition: color 200ms linear;
    }

    .colmenu3 li.active > a {
        color: rgb(0, 200, 225);
        padding: 12px 15px 8px 0;
        font-size: 10pt;
    }

</style>

<header>

    <div id="header">

        <div id="header-right">
            <div id="header-right-top">


                @if(! auth()->user())
                    <span class="login-icon"></span>
                    <span class="text">
                    فروشگاه اینترنتی دیجی کالا ،
                </span>

                    <a class="login" href="{{ route('login') }}">
                        وارد شوید
                    </a>

                    <span class="register-icon"></span>
                    <a class="register" href="{{ route('register') }}">ثبت نام کنید</a>

                @else

                    <div class="logged-in">
                        <a href="{{ route('profile') }}">
                            <i class="fa-solid fa-user"></i>
                            <span>مشاهده ی پروفایل</span>
                        </a>
                    </div>

                    <div class="logout">
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <span onclick="$('#logout').submit();">خروج از حساب کاربری</span>
                        </form>
                    </div>

                @endif

            </div>

            <div id="header-right-bottom">
                <a class="shopping-basket" href="{{ route('cart') }}">
                    <div class="icon"></div>
                    <div class="number">
                        <span class="text">
                            سبد خرید
                        </span>
                        <span class="circle">
                            {{ engToPersian(\Cart::count()) }}
                        </span>
                    </div>
                </a>

                <div id="search">
                    <form action="{{ route('keyword.search') }}" method="get" id="search-form">
                        <input type="text" name="keyword"
                               placeholder="محصول ، دسته یا برند مورد نظرتان را جستجو کنید...">
                        <span class="search-icon" onclick="$('#search-form').submit();"></span>
                    </form>
                </div>

            </div>
        </div>

        <div id="header-left">
            <a href="{{ route('home') }}">
                <img src="{{ getSetting('logo') }}">
            </a>
        </div>

    </div>

</header>

<nav>

    <div id="menu">

        <ul class="menu1">

            @foreach(\App\Models\Category::where('parent' , 0)->get() as $category)

                <li data-num="{{ $category->id }}">
                    <a href="{{ route('category.search', $category->slug) }}">
                        @if(count($category->children) > 0)
                            <span class="down-icon-menu"></span>
                        @endif
                        <span>{{ $category->title }}</span>
                    </a>

                    <ul class="menu2">
                        @foreach($category->children as $subCategory)
                            <li data-num="{{ $subCategory->id }}">
                                <a href="{{ route('category.search', $subCategory->slug) }}">{{ $subCategory->title }}</a>
                                @if(count($subCategory->children) > 0)
                                    <div class="submenu3">
                                        <ul class="colmenu3">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach($subCategory->children as $subsubCategory)
                                                @if($i %  8 == 0)
                                        </ul>
                                        <ul class="colmenu3">
                                            @endif
                                            <li class="active">
                                                <a href="{{ route('category.search', $subsubCategory->slug) }}">{{ $subsubCategory->title }}</a>
                                            </li>
                                            @foreach ($subsubCategory->children as $finalSub)
                                                @if($i % 8 == 0)
                                        </ul>
                                        <ul class="colmenu3">
                                            @endif
                                            <li>
                                                <a href="{{ route('category.search', $finalSub->slug) }}">{{ $finalSub->title }}</a>
                                            </li>
                                            @php
                                                $i++;
                                            @endphp

                                            @endforeach
                                            @php
                                                $i++;
                                            @endphp
                                            @endforeach
                                        </ul>

                                        {{--2 Another ways to get image source from Database--}}

                                        {{--<img src="{{ \Illuminate\Support\Facades\DB::table('menu_images')->where('category_id' , '=' , $subCategory->id)->value('image') }}" width="250">

                                        <img src="{{ \App\Models\MenuImage::where('category_id' , $subCategory->id)->pluck('image')->first() }}" width="250">--}}

                                        <img src="{{ $subCategory->image()->pluck('image')->first() }}" width="250">
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>

            @endforeach

        </ul>

    </div>

</nav>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        }
    });
</script>
