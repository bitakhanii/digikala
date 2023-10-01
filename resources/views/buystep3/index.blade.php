@component('layouts.content')
    @php
        use Modules\Cart\Facade\Cart;
    @endphp

    <style>

        #main {
            width: 1200px;
            margin: 10px auto;
        }

        #main::after {
            content: "";
            display: block;
            clear: both;
        }

        #buy-step3 {
            background-color: #fff;
            padding: 40px 15px;
            float: right;
            width: 1170px;
        }

        .blue-btn.icon i {
            width: 12px;
            height: 12px;
            display: inline-block;
            background: url(/images/slices.png) -33px -566px;
            position: relative;
            top: 3px;
            margin-right: 15px;
        }

        .next-level {
            float: right;
            font-size: 9.5pt;
            color: #4b4b4b;
            margin: 7px 0 40px 0;
            width: 100%;
            text-align: left;
        }

        #product {
            width: 100%;
            margin-bottom: 40px;
        }

        #product thead tr {
            font-size: 10.5pt;
            color: #6C6C6C;
            background-color: #f7f9fa;
        }

        #product thead td {
            text-align: center;
            padding: 10px;
            border-top: 1px solid #f2f2f2;
            border-bottom: 1px solid #f2f2f2;
            border-left: 1px solid #f2f2f2;
        }

        #product thead td:first-child {
            border-right: 1px solid #f2f2f2;
        }

        #product thead td:nth-child(4) {
            border-left: 0;
        }

        #product tbody tr {
            font-size: 11pt;
            color: #575757;
            background-color: #fff;
        }

        #product tbody td {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #f2f2f2;
            border-left: 1px solid #f2f2f2;
        }

        #product tbody td:first-child {
            border-right: 1px solid #f2f2f2;
            min-width: 550px;
        }

        #product tbody .image {
            float: right;
        }

        #product tbody .image img {
            width: 120px;
        }

        #product tbody .description {
            float: right;
            margin-right: 30px;
            width: 400px;
        }

        #product tbody .persian {
            margin: 0 0 15px 0;
            color: #444444;
            font-size: 9.8pt;
        }

        #product tbody .english {
            margin: 0 0 15px 0;
            color: #060606;
            font-size: 9.5pt;
            text-align: left;
        }

        #product tbody .color {
            float: right;
            width: 100%;
        }

        #product tbody .color p {
            margin: 0;
            font-size: 10pt;
            color: #505050;
            float: right;
        }

        #product tbody .color .circle {
            width: 16px;
            height: 16px;
            border-radius: 100%;
            float: right;
            margin: 1px 12px 0 10px;
        }

        #product tbody .color .name {
            font-size: 9.5pt;
            color: #6f6f6f;
        }

        #product tbody .warranty {
            font-size: 10pt;
            color: #6f6f6f;
            margin-top: 15px;
            float: right;
        }

        #product tbody td:nth-child(2) p {
            font-size: 11pt;
            color: #7A7A7A;
            font-family: yekan-exbold;
            text-align: center;
        }

        #product tbody .price {
            font-size: 11pt;
            color: #858585;
            font-family: yekan-exbold;
            margin-left: 5px;
        }

        #product tbody .toman {
            font-size: 8.6pt;
            color: #888888;
        }

        #product tbody .price-box {
            float: left;
            width: 100%;
        }

        #product tbody .price-box .toman {
            margin: 4px 0 0 0;
            float: left;
        }

        #product tbody .price-box .text {
            font-size: 10.5pt;
            color: #888888;
            float: right;
        }

        #product tbody .price-box .price {
            float: left;
        }

        #product tbody .discount-box {
            margin-top: 10px;
            float: left;
            width: 100%;
        }

        #product tbody .discount-box .text {
            font-size: 10pt;
            color: #ff585d;
            float: right;
        }

        #product tbody .discount-box .price {
            font-size: 12pt;
            color: #ff585d;
            float: left;
            font-family: yekan-exbold;
            margin-left: 5px;
        }

        #product tbody .discount-box .toman {
            font-size: 8.6pt;
            color: #ff585d;
            float: left;
            margin: 4px 0 0 0;
        }

        #product tbody .final-price {
            float: left;
            width: 100%;
            margin-top: 20px;
            border-top: 1px dashed #e9e9e9;
            text-align: center;
        }

        #product tbody .final-price .price {
            font-size: 12pt;
            color: #29b024;
            font-family: yekan-exbold;
            margin: 20px 0 0 10px;
            display: inline-block;
        }

        #product tbody .final-price .toman {
            font-size: 8.6pt;
            color: #29b024;
            margin: 4px 0 0 0;
        }

        #product tbody .refresh {
            width: 40px;
            height: 100%;
            background-color: #e3f6ff;
        }

        #product tbody tr td:last-child {
            padding: 0;
        }

        #product tbody .refresh i {
            width: 20px;
            height: 20px;
            background: url(/images/slices.png) -810px -410px;
            display: block;
            margin: auto;
            cursor: pointer;
        }

        #buy-step3 .head {
            margin-bottom: 30px;
            float: right;
            width: 100%;
        }

        #buy-step3 .head > p {
            margin: 5px 0 0 0;
            font-size: 11.5pt;
            color: #393939;
            float: right;
        }

        #buy-step3 .head > p i {
            width: 5px;
            height: 8px;
            display: inline-block;
            background: url(/images/slices.png) -37px -652px;
            margin-left: 12px;
        }

        #bills {
            width: 100%;
            border: 1px solid #f0f0f0;
            border-radius: 2px;
            margin-bottom: 40px;
        }

        #bills tr {
            font-size: 9.5pt;
            color: #838383;
        }

        #bills td {
            padding: 20px 16px;
            border-bottom: 1px solid #f0f0f0;
        }

        #bills tr:last-child td {
            border-bottom: 0;
        }

        #bills .title {
            width: 90%;
        }

        #bills .price {
            font-size: 10.5pt;
            font-family: yekan-exbold;
            padding: 20px 10px;
            text-align: left;
        }

        #bills .toman {
            font-size: 8pt;
            padding: 20px 8px 20px 20px;
        }

        #bills tr:nth-child(3) {
            background-color: #fef6f3;
            color: #f66464;
        }

        #bills tr:nth-child(4) {
            background-color: #f3fff4;
            font-size: 12.5pt;
            color: #1E8619;
        }

        #bills tr:nth-child(4) .price {
            font-size: 13pt;
        }

        #send-info {
            width: 100%;
            border: 1px solid #f0f0f0;
            border-radius: 2px;
            margin-bottom: 10px;
        }

        #send-info tr {
            color: #5f5f5f;
            font-size: 9.5pt;
        }

        #send-info td {
            padding: 18px 25px;
            border-left: 1px solid #f0f0f0;
            border-bottom: 1px solid #f0f0f0;
        }

        #send-info tr:last-child td {
            border-bottom: 0;
        }

        #send-info td:first-child {
            padding: 16px 12px;
        }

        #send-info tr td:last-child {
            border-left: none;
        }

        #send-info td i {
            width: 18px;
            height: 24px;
            display: block;
            background: url(/images/slices.png) -810px -204px;
            margin: auto;
        }

        #send-info tr:nth-child(2) i {
            background-position: -806px -250px;
            width: 26px;
        }

        #send-info td span {
            color: #21a600;
        }

        .buttons {
            width: 100%;
            float: right;
            margin-top: 85px;
        }

        .buttons .gray-btn {
            float: right;
        }

        .buttons .agree {
            float: left;
            width: 220px;
            margin-left: 20px;
        }

        .buttons .agree i {
            width: 16px;
            height: 16px;
            background: url(/images/slices.png) -383px -191px;
            float: right;
            margin: 2px 0 0 3px;
            cursor: pointer;
        }

        .buttons .agree i.active {
            background-position: -383px -219px;
        }

        .buttons .agree p {
            margin: 0;
            font-size: 10pt;
            color: #383838;
        }

    </style>

    <div id="main">

        <div id="main-content">

            <div class="buy-steps">

                <div class="dash active">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <ul>
                    <li class="active">
                        <span></span>
                        <div class="active"></div>
                        <p class="active">
                            ورود به دیجی کالا
                        </p>
                    </li>

                    <li class="active">
                        <span></span>
                        <div class="active"></div>
                        <p class="active">
                            اطلاعات ارسال سفارش
                        </p>
                    </li>

                    <li class="half-active">
                        <span></span>
                        <div></div>
                        <p class="active">
                            بازبینی سفارش
                        </p>
                    </li>

                    <li>
                        <span></span>
                        <p>
                            اطلاعات پرداخت
                        </p>
                    </li>
                </ul>

                <div class="dash">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>

            <div id="buy-step3">

                <a class="blue-btn icon" href="{{ route('payment-info') }}">
                    ثبت اطلاعات و ادامه خرید
                    <i></i>
                </a>

                <div class="next-level">
                    مرحله بعد: تکمیل اطلاعات پرداخت
                </div>

                <table id="product" cellspacing="0">

                    <thead>
                    <tr>
                        <td>شرح محصول</td>
                        <td>تعداد</td>
                        <td>قیمت واحد</td>
                        <td>قیمت کل</td>
                        <td></td>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach(Cart::all() as $cart)
                        @php
                            $product = $cart['product'];
                            $color = $cart['color'];
                        @endphp
                        <tr>
                            <td>

                                <div class="image">
                                    <a href="{{ route('product', $cart['product_id']) }}">
                                        <img src="/images/products/{{ $cart['product_id'] }}/product-{{ $cart['product_id'] }}_220.jpg">
                                    </a>
                                </div>
                                <div class="description">

                                    <p class="persian">{{ $product['title'] }}</p>

                                    <p class="english">{{ $product['en_title'] }}</p>

                                    @if($color)
                                        <div class="color">

                                            <p>
                                                رنگ: {{ $color['name'] }}
                                            </p>

                                            <span class="circle"
                                                  style="background-color: {{ $color['hex'] }};"></span>
                                            <span class="name"></span>

                                        </div>
                                    @endif

                                </div>

                            </td>

                            <td>
                                <p>{{ $cart['number'] }}</p>
                            </td>

                            <td>
                            <span
                                class="price">{{ number_format($product['price']) }}</span>
                                <span class="toman">تومان</span>
                            </td>

                            <td>
                                @if($product['discount'] == 0)

                                    <span
                                        class="price">{{ number_format($product['price'] * $cart['number']) }}</span>
                                    <span class="toman">تومان</span>
                                @else
                                    <div class="price-box">
                                        <span class="text">قیمت کل: </span>
                                        <span class="toman">تومان</span>
                                        <span
                                            class="price">{{ number_format($product['price'] * $cart['number']) }}</span>
                                    </div>

                                    <div class="discount-box">
                                <span class="text">
                                    (-) تخفیف شگفت انگیز:
                                </span>
                                        <span class="toman">تومان</span>
                                        <span
                                            class="price">{{ number_format(($product['final_price']) * $cart['number']) }}</span>
                                    </div>

                                    <div class="final-price">
                                    <span
                                        class="price">{{ number_format($product['final_price'] * $cart['number']) }}</span>
                                        <span class="toman">تومان</span>
                                    </div>

                                @endif

                            </td>

                            <td class="refresh">
                                <a href="{{ route('cart') }}">
                                    <i></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>

                <div class="head">
                    <p>
                        <i></i>
                        خلاصه صورتحساب شما
                    </p>
                </div>

                <table id="bills" cellspacing="0">

                    <tbody>
                    <tr>
                        <td class="title">
                            جمع کل خرید شما:
                        </td>
                        <td class="price">{{ number_format(    $amount) }}</td>
                        <td class="toman">
                            تومان
                        </td>
                    </tr>

                    <tr>
                        <td class="title">
                            هزینه ارسال، بیمه و بسته بندی سفارش:
                        </td>
                        <td class="price">{{ number_format(getSetting('post_price')) }}</td>
                        <td class="toman">
                            تومان
                        </td>
                    </tr>

                    <tr>
                        <td class="title">
                            جمع کل تخفیف:
                        </td>
                        <td class="price">{{ number_format($discounts) }}</td>
                        <td class="toman">
                            تومان
                        </td>
                    </tr>

                    <tr>
                        <td class="title">
                            جمع کل قابل پرداخت:
                        </td>
                        <td class="price add-comma total-price">
                            {{ number_format($totalAmount) }}
                        </td>
                        <td class="toman">
                            تومان
                        </td>
                    </tr>
                    </tbody>

                </table>

                <div class="head">
                    <p>
                        <i></i>
                        اطلاعات ارسال سفارش:
                    </p>
                </div>

                <table id="send-info" cellspacing="0">

                    @php
                        $name = explode('-', $address->name);
                    @endphp

                    <tbody>
                    <tr>
                        <td>
                            <i></i>
                        </td>
                        <td>
                            این سفارش به
                            <span>{{ $name[0].' '.$name[1] }}</span>
                            به آدرس
                            <span>{{ $address['address'] }}</span>
                            و شماره تماس {{ $address['mobile'] }} تحویل می گردد
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i></i>
                        </td>
                        <td>
                            این سفارش از طریق
                            <span>
                                    پست پیشتاز
                                (هزینه ارسال طبق تعرفه پست)
                            </span>
                            با هزینه
                            <span>{{ number_format(getSetting('post_price')) }}</span>
                            تومان به شما تحویل داده خواهد شد.
                        </td>
                    </tr>
                    </tbody>

                </table>

                <a href="{{ route('addresses.index') }}" class="gray-btn">
                    ویرایش
                </a>

                <div class="buttons">

                    <a class="gray-btn" href="{{ route('addresses.index') }}">
                        بازگشت
                    </a>

                    <a class="blue-btn icon" onclick="digikalaCall();" href="{{ route('payment-info') }}">
                        ثبت اطلاعات و ادامه خرید
                        <i></i>
                    </a>

                    <div class="agree">

                        <i></i>

                        <p>
                            آماده پاسخگویی به تماس دیجی کالا در خارج از ساعات اداری از 21:00 تا 23:59 هستم.
                        </p>

                    </div>

                    <div class="next-level">
                        مرحله بعد: تکمیل اطلاعات پرداخت
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>

        /*Agree Checkbox*/

        $('.agree i').click(function () {

            $(this).toggleClass('active');
        });

        function digikalaCall() {
            var checkbox = $('.agree i');
            var url = '/digikala-call';
            if (checkbox.hasClass('active')) {
                var data = {'call': 1};
            } else {
                data = {'call': 0};
            }


            $.ajax({
                type: 'POST',
                url: url,
                data: data,
            });
        }

    </script>
@endcomponent
