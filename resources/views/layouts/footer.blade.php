<style>

    footer {
        width: 100%;
        float: right;
        margin-top: 60px;
    }

    #most-visitation {
        height: 800px;
    }

    #visitation-banner {
        height: 70px;
        background-color: #e0e1e0;
    }

    #visitation-banner .content {
        width: 1200px;
        height: 100%;
        margin: auto;
    }

    #visitation-banner .text-left, #visitation-banner .text-right {
        line-height: 70px;
        float: right;
        margin: 0;
        font-size: 13pt;
        color: #393B3B;
        font-family: yekan-bold;
    }

    #visitation-banner .text-right {
        padding-left: 200px;
    }

    #visitation-main {
        height: 730px;
        background-color: #fff;
    }

    #visitation-main .content {
        width: 1200px;
        height: 100%;
        margin: auto;
    }

    #visitation-main .right-col {
        margin-top: 50px;
        height: 600px;
        float: right;
    }

    #visitation-main .right-col > ul {
        padding: 0;
        margin: 0;
        float: right;
    }

    #visitation-main .right-col ul .active-visit::before {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 8px 12px 8px 0;
        border-color: transparent #ffffff transparent transparent;
        position: absolute;
        left: -12px;
        top: 54px;
        z-index: 2;
    }

    #visitation-main .right-col li {
        width: 350px;
        height: 115px;
        cursor: pointer;
        padding-top: 10px;
        position: relative;
        margin-bottom: 10px;
    }

    .active-visit {
        border: 1px solid #d0d1d2;
        border-radius: 5px;
    }

    #visitation-main .right-col ul .active-visit::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 8px 12px 8px 0;
        border-color: transparent #babbbc transparent transparent;
        position: absolute;
        left: -13px;
        top: 54px;
    }

    #visitation-main .right-col li img {
        float: right;
        margin-left: 15px;
        padding-right: 20px;
        height: 100px;
    }

    #visitation-main .right-col li .group-1 {
        font-size: 9pt;
        float: right;
        margin-top: 40px;
        color: #393B3B;
        position: relative;
    }

    #visitation-main .right-col li i {
        background: url(/images/slices.png);
        background-position: -35px -678px;
        width: 10px;
        height: 10px;
        display: block;
        float: right;
        margin: 33px 8px 0 8px;
    }

    #visitation-main .left-col {
        width: 840px;
        float: left;
        margin-top: 50px;
        overflow: hidden;
        height: 640px;
    }

    #visitation-main .left-col-item {
        margin-top: 15px;
        height: 100%;
    }

    #visitation-main .left-col-item li {
        width: 180px;
        height: 320px;
        float: left;
        margin-right: 25px;
        cursor: pointer;
        z-index: 2;
        text-align: center;
        position: relative;
    }

    #visitation-main .left-col-item li:hover {
        transform: scale(1.1);
    }

    #visitation-main .left-col-item li:hover .name {
        color: #000;
    }

    #visitation-main .left-col .image {
        margin: 10px auto 0 auto;
        width: 115px;
        height: 115px;
    }

    #visitation-main .left-col-item .name {
        font-size: 9pt;
        color: #5B5D5D;
        position: absolute;
        top: 160px;
        right: 0;
        left: 0;
        margin: auto;
        text-align: center;
    }

    #visitation-main .left-col-item .price-off {
        width: 160px;
        font-size: 8pt;
        color: #a9aea9;
        text-align: center;
        position: absolute;
        bottom: 80px;
        left: 0;
        right: 0;
        margin: auto;
        background-color: #ebeced;
    }

    #visitation-main .left-col-item .price {
        position: absolute;
        bottom: 40px;
        font-size: 9pt;
        color: #40ae4d;
        right: 30px;
    }

    #visitation-main .left-col-item .toman {
        position: absolute;
        bottom: 37px;
        font-size: 9pt;
        color: #40ae4d;
        left: 30px;
    }

    #footer-features {
        height: 320px;
    }

    #footer-connect {
        background-color: #6d717a;
        height: 45px;
    }

    #footer-connect .main {
        width: 1200px;
        margin: auto;
        height: 100%;
    }

    #footer-connect .main p {
        font-size: 10pt;
        color: #fff;
        margin: 0;
        line-height: 40px;
        float: right;
        height: 100%;
    }

    #footer-connect .main .connect {
        float: left;
        height: 100%;
        font-size: 10pt;
    }

    #footer-connect .connect ul {
        width: 100%;
        height: 100%;
    }

    #footer-connect .connect li {
        height: 100%;
        float: left;
        margin-right: 50px;
    }

    #footer-connect .connect li:nth-child(2) {
        cursor: pointer;
    }

    #footer-connect .connect li a {
        text-align: center;
        line-height: 45px;
        color: #fff;
    }

    #footer-connect .connect ul li p {
        float: left;
        font-size: 11pt;
        direction: ltr;

    }

    #footer-connect .main .connect i {
        background: url(/images/slices.png);
        width: 25px;
        height: 25px;
        display: block;
        margin: 10px 6px 0 0;
        float: left;
    }

    #footer-guide {
        height: 275px;
        background-color: #f7f8fa;
    }

    #footer-guide .main {
        width: 1200px;
        height: 100%;
        margin: auto;
    }

    #footer-guide .shopping-help {
        height: 100%;
        width: 250px;
        float: right;
    }

    #footer-guide .customer-services {
        width: 220px;
        height: 100%;
        float: right;
        margin-right: 75px;
    }

    #footer-guide h3 {
        font-weight: normal;
        font-family: yekan-exbold;
        font-size: 10.2pt;
        color: #494747;
        margin: 40px 0 30px 0;
        cursor: default;
    }

    #footer-guide .shopping-help a, #footer-guide .customer-services a {
        color: #5C5A5A;
        font-size: 10.2pt;
        padding-bottom: 15px;
        cursor: pointer;
        display: block;
        transition: color 200ms;
    }

    #footer-guide a:hover {
        color: #ee5c41;
    }

    #footer-guide .other {
        width: 540px;
        height: 100%;
        float: left;
    }

    #footer-guide .other .email {
        height: 40px;
    }

    #footer-guide .email input {
        width: 405px;
        height: 36px;
        border-radius: 3px;
        overflow: hidden;
        font-size: 9.5pt;
        color: #949090;
        padding-right: 15px;
        border: 1px solid #C2BEBE;
        float: right;
        outline: none;
    }

    #footer-guide .other .social-media {
        height: 100px;
        margin-top: 30px;
    }

    #footer-guide .social-media .app {
        float: left;
        margin-right: 18px;
        cursor: pointer;
        padding: 0;
    }

    #footer-guide .social-media .app i {
        color: #5C5A5A;
        font-size: 17pt;
        transition: color 200ms;
    }

    #footer-guide .social-media .app i:hover {
        color: #ee5c41;
    }

    #footer-guide .social-media span {
        width: 28px;
        height: 28px;
        display: block;
        background: url(/images/slices.png);
        float: right;
        margin: 10px 0 0 8px;
        cursor: pointer;
    }

    #footer-menu {
        background-color: #fff;
    }

    #footer-menu .main {
        width: 1200px;
        margin: auto;
    }

    #footer-menu .main::after {
        content: "";
        display: block;
        clear: both;
    }

    .footer-menu-col {
        width: 190px;
        height: 350px;
        float: right;
        margin-right: 60px;
    }

    .footer-menu-col:first-child {
        margin-right: 0;
    }

    .footer-menu-col:nth-child(6) {
        margin-right: 0;
    }

    .footer-menu-col h3 a {
        font-weight: normal;
        font-family: yekan-exbold;
        font-size: 10.2pt;
        color: #494747;
        margin: 40px 0 30px 0;
        cursor: pointer;
        transition: color 200ms;
    }

    .footer-menu-col > a {
        color: #5C5A5A;
        font-size: 10.2pt;
        padding-bottom: 15px;
        cursor: pointer;
        display: block;
        transition: color 200ms;
    }

    #footer-menu a:hover {
        color: #ee5c41;
    }

</style>

<footer>

    <div id="footer-features">

        <div id="footer-connect">

            <div class="main">

                <p>
                    ۷ روز هفته، ۲۴ ساعته پاسخگوی شما هستیم.
                </p>

                <div class="connect">

                    <ul>
                        <li>
                            <a>
                                <i style="background-position: -316px -420px;"></i>
                                {{ getSetting('email_address') }}
                            </a>
                        </li>

                        <li>
                            <a>
                                <i style="background-position: -355px -420px;"></i>

                                سوالات متداول
                            </a>
                        </li>

                        <li>
                            <a style="text-align: left;direction: ltr;">
                                <i style="background-position: -395px -420px;"></i>

                                {{ engToPersian('021-'.getSetting('phone_number_1').' / 021-'.getSetting('phone_number_2')) }}
                            </a>
                        </li>
                    </ul>

                </div>

            </div>

        </div>

        <div id="footer-guide">
            <div class="main">

                <div class="shopping-help">

                    <h3>
                        راهنمای خرید از دیجی کالا
                    </h3>

                    <a>
                        ثبت سفارش
                    </a>

                    <a>
                        رویه های ارسال سفارش
                    </a>

                    <a>
                        شیوه های پرداخت
                    </a>

                    <a>
                        معرفی دیجی بن
                    </a>

                </div>
                <div class="customer-services">

                    <h3>
                        خدمات مشتریان
                    </h3>

                    <a>
                        پاسخ به پرسش های متداول
                    </a>

                    <a>
                        رویه های بازگرداندن کالا
                    </a>

                    <a>
                        شرایط استفاده
                    </a>

                    <a>
                        حریم خصوصی
                    </a>

                </div>
                <div class="other">

                    <h3>
                        اولین نفری که مطلع می شود، باشید!
                    </h3>

                    <div class="email">

                        <input type="text" placeholder="آدرس ایمیل خود را وارد کنید">

                        <span class="blue-btn">
                    تایید ایمیل
                </span>

                    </div>

                    <div class="social-media">
                        <a title="اپلیکیشن ios" class="app"><i class="fa-brands fa-app-store-ios"></i></a>
                        <a title="اپلیکیشن اندروید" class="app"><i class="fa-brands fa-android"></i></a>

                        <a><span title="فیسبوک" style="background-position: -577px -621px;"></span></a>
                        <a><span title="توییتر" style="background-position: -453px -621px;"></span></a>
                        <a><span title="گوگل پلاس" style="background-position: -494px -621px;"></span></a>
                        <a><span title="اینستاگرام" style="background-position: -536px -621px;"></span></a>
                        <a><span title="آپارات" style="background-position: -370px -621px;"></span></a>
                        <a><span title="تلگرام" style="background-position: -618px -621px;"></span></a>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <div id="footer-menu">

        <div class="main">

            @foreach(\App\Models\Category::where('parent' , 0)->get() as $category)

                <div class="footer-menu-col">

                    <h3>
                        <a href="{{ route('category.search', $category->slug) }}">
                            {{ $category->title }}
                        </a>
                    </h3>

                    @foreach($category->children as $subCategory)
                        <a href="{{ route('category.search', $subCategory->slug) }}">{{ $subCategory->title }}</a>
                    @endforeach

                </div>

            @endforeach

        </div>

    </div>

</footer>

<script>

    /*Menu*/

    var timer = {};

    function openSubMenu(tag) {

        var timerAttr = tag.attr('data-num');
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {
            $('> ul', tag).fadeIn(0);
            $('> .submenu3', tag).fadeIn(0);
            tag.addClass('active');
            tag.find('span.down-icon-menu').removeClass().addClass('up-icon-menu');
        }, 500)
    }

    function closeSubMenu(tag) {

        var timerAttr = tag.attr('data-num');
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {
            $('> ul', tag).fadeOut(0);
            $('> .submenu3', tag).fadeOut(0);
            tag.removeClass('active');
            tag.find('span.up-icon-menu').removeClass().addClass('down-icon-menu');
        }, 500)
    }

    $('#menu > ul > li').hover(function () {
        openSubMenu($(this));

    }, function () {
        closeSubMenu($(this));
    });

    $('#menu > ul > li > ul > li').hover(function () {
        openSubMenu($(this));

    }, function () {
        closeSubMenu($(this));
    });

    //Submit a Form

    function submitForm(formID) {
        $('#' + formID).submit();
    }

    /*Show Password*/

    function showPassword(tag) {
        let input = $(tag).parents('.password').find('#password');
        let eyeSlash = $(tag).parents('.password').find('.fa-eye-slash');
        let eye = $(tag).parents('.password').find('.fa-eye');
        let type = input.attr('type');

        if (type === "password") {
            input.attr('type','text');
            eyeSlash.fadeIn(0);
            eye.fadeOut(0);
        } else {
            input.attr('type','password');
            eyeSlash.fadeOut(0);
            eye.fadeIn(0);
        }
    }

    // Convert English Numbers To Persian in Input
    // How To Use? ->  <input  type="text" id="mobile" name="mobile" onkeyup="toEnglishNumber(this.value,'mobile');">

    function toPersianNumber(strNum, name) {
        var pn = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
        var en = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

        var cache = strNum;
        for (var i = 0; i < 10; i++) {
            var regex_fa = new RegExp(en[i], 'g');
            cache = cache.replace(regex_fa, pn[i]);
            new RegExp()
        }
        $('#' + name).val(cache);
    }

    // Convert Persian Numbers To English in Input

    function toEnglishNumber(strNum, name) {
        var pn = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
        var en = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

        var cache = strNum;
        for (var i = 0; i < 10; i++) {
            var regex_fa = new RegExp(pn[i], 'g');
            cache = cache.replace(regex_fa, en[i]);
            new RegExp()
        }
        $('#' + name).val(cache);
    }

    /*Check Box*/

    function checkBox(tag, parent) {

        var inputTag = $(tag);
        if (inputTag.is(':checked')) {
            inputTag.parents('.' + parent).find('.check-box').addClass('checked');
        } else {
            inputTag.parents('.' + parent).find('.check-box').removeClass('checked');
        }
    }

    /*Custom Checkbox*/

    function customCheckbox(tag) {
        var thisTag = $(tag);
        if (thisTag.hasClass('active')) {
            thisTag.removeClass('active');
            thisTag.find('input').removeAttr('checked');
        } else {
            thisTag.addClass('active');
            thisTag.find('input').attr('checked', 'checked');
        }
    }

    /*Add Commas to prices*/
    function itpro(Number) {
        Number += '';
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        x = Number.split('.');
        y = x[0];
        z = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(y))
            y = y.replace(rgx, '$1' + ',' + '$2');
        return y + z;
    }

    /* Make Persian all English numbers */
    $(document).ready(function () {
        $('.fa-num').persiaNumber();
    })


    /* Make english numbers to persian Example for input tags when it has an old value */
    function replaceDigits(input) {
        var map = {
            '0': '۰',
            '1': '۱',
            '2': '۲',
            '3': '۳',
            '4': '۴',
            '5': '۵',
            '6': '۶',
            '7': '۷',
            '8': '۸',
            '9': '۹'
        };
        return input.replace(/\d/g, function (match) {
            return map[match];
        });
    }

</script>

</body>
</html>
