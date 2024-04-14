@component('layouts.content')
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

        #main-content {
            background-color: #fff;
            border-radius: 3px;
            box-shadow: 0 2px 2px #e2e8e8;
            margin-top: 10px;
            float: right;
            width: 100%;
        }

        #buy-step4 {
            background-color: #fff;
            padding: 40px 15px;
            float: right;
            width: 1170px;
        }

        #buy-step4 .head {
            margin-bottom: 40px;
            float: right;
            width: 100%;
        }

        #buy-step4 .head > p {
            margin: 5px 0 0 0;
            font-size: 12pt;
            color: #393939;
            float: right;
        }

        #buy-step4 .head > p i {
            width: 5px;
            height: 8px;
            display: inline-block;
            background: url(/images/slices.png) -37px -652px;
            margin-left: 12px;
        }

        #buy-step4 .head > p img {
            margin: 0 4px 0 8px;
            transform: rotate(30deg);
            position: relative;
            top: 6px;
        }

        .digibon {
            width: 100%;
            border: 1px solid #ededed;
            border-radius: 2px;
            margin-bottom: 60px;
        }

        .digibon td {
            padding: 20px 18px 20px 10px;
        }

        .digibon tr td:nth-child(2) {
            padding: 20px 0 20px 0;
        }

        .digibon tr td:nth-child(3) {
            padding: 20px 0 20px 12px;
        }

        .digibon td p {
            font-size: 12pt;
            color: #424242;
            margin: 0;
        }

        .digibon td .text {
            font-size: 10.2pt;
            color: #797979;
            margin-top: 10px;
            max-width: 750px;
            display: inline-block;
        }

        .digibon td input {
            border: 1px solid #c4c4c4;
            width: 200px;
            height: 36px;
            border-radius: 3px;
            outline: none;
            text-align: left;
            color: #636363;
        }

        .digibon .discount-code.true {
            border: 2px solid #32bb1f;
        }

        .digibon .discount-code.false {
            border: 2px solid #ea3f3d;
        }

        .digibon .code-status {
            font-size: 9pt;
            margin-top: 3px;
            position: absolute;
        }

        .digibon .code-status.true {
            color: #32bb1f;
        }

        .digibon .code-status.false {
            color: #ea3f3d;
        }

        .total-price {
            background-color: #f5fef6;
            border: 1px solid #ededed;
            padding: 7px 10px;
            float: right;
            width: 1148px;
            margin-bottom: 45px;
        }

        .total-price .right {
            float: right;
            font-size: 12pt;
            color: #414141;
        }

        .total-price .left {
            float: left;
        }

        .total-price .left p {
            margin: 5px 0 0 0;
            float: right;
            color: #3ea348;
            font-size: 12pt;
            font-family: yekan-exbold;
        }

        .total-price .left span {
            margin: 9px 10px 0 0;
            float: right;
            color: #3ea348;
            font-size: 8.5pt;
        }

        .pay-way {
            width: 100%;
            border: 1px solid #f2f2f2;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        .pay-way.active {
            border: 1px solid #a0d99b;
        }

        .pay-way td {
            border-right: 1px solid #f2f2f2;
            padding: 50px 15px 65px 0;
        }

        .pay-way td:first-child {
            border-right: none;
        }

        .pay-way td:last-child {
            padding: 12px 20px;
            text-align: center;
        }

        .pay-way .act {
            padding: 0;
            cursor: pointer;
            width: 60px;
            position: relative;
        }

        .pay-way.active .act {
            border-left: 1px solid #a0d99b;
            background-color: #f7fff7;
        }

        .pay-way .act span {
            width: 17px;
            height: 17px;
            display: block;
            background: url(/images/slices.png) -344px -190px;
            margin: auto;
        }

        .pay-way.active .act span {
            background-position: -344px -219px;
        }

        .pay-way td i.blue {
            background: url(/images/slices.png) -875px -359px;
        }

        .pay-way td:nth-child(2) .title {
            font-size: 11pt;
            color: #4F4F4F;
            margin: 0;
        }

        .pay-way td:nth-child(2) span {
            font-size: 9.5pt;
            color: #909090;
            margin: 5px 0;
            float: right;
        }

        .pay-choose {
            padding: 0;
            margin: 15px 0 0 0;
            float: right;
            width: 100%;
        }

        .pay-choose li {
            float: right;
            margin-left: 15px;
            cursor: pointer;
        }

        .pay-choose li p {

            font-size: 9.8pt;
            color: #4D4D4D;
            margin: 0;
            float: right;
        }

        .pay-choose li i {
            width: 17px;
            height: 16px;
            display: block;
            background: url(/images/slices.png) -345px -190px;
            float: right;
            margin: 0 15px 0 8px;
        }

        .pay-choose li.active i {
            background-position: -344px -219px;
        }

        .pay-way td img {
            width: 130px;
            height: 130px;
            margin-top: -28px;
        }

        .pay-way td a {
            color: #727272;
            border-bottom: 2px dashed #727272;
            display: block;
            font-size: 10pt;
            width: 275px;
            margin: auto;
        }

        .pay-way tr td:nth-child(3) {
            width: 25%;
            border-right: 0;
        }

        .buttons {
            width: 100%;
            float: right;
            margin-top: 100px;
        }

        .buttons .gray-btn {
            float: right;
        }

        .buttons .agree {
            float: left;
            width: 375px;
            margin-left: 20px;
        }

        .buttons .agree p {
            margin: 0;
            font-size: 10pt;
            color: #5C5C5C;
        }

        .buttons .agree a {
            color: #2196f3;
            border-bottom: 1px dashed #2196f3;
            cursor: pointer;
        }

        input[type=radio] {
            position: absolute;
            display: none;
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

                    <li class="active">
                        <span></span>
                        <div class="active"></div>
                        <p class="active">
                            بازبینی سفارش
                        </p>
                    </li>

                    <li class="half-active">
                        <span></span>
                        <p class="active">
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

            <div id="buy-step4">

                <div class="head">
                    <p>
                        <i></i>
                        کد تخفیف
                    </p>
                </div>

                <table class="digibon">

                    <tbody>
                    <tr>
                        <td>

                            <p>
                                کد تخفیف دیجی کالا دارم
                            </p>

                            <span class="text">
                           اگر مایل هستید از کد تخفیف دیجی کالا استفاده کنید، کافیست کد آن را وارد کرده و با انتخاب دکمه ثبت مبلغ آن از هزینه قابل پرداخت شما کسر می شود:
                                </span>

                        </td>
                        <td>
                            <input class="discount-code" name="code">
                            <p class="code-status true"></p>
                            <p class="code-status false"></p>
                        </td>
                        <td>
                            <a class="blue-btn" onclick="checkCode();">
                                ثبت کد تخفیف
                            </a>
                        </td>
                    </tr>
                    </tbody>

                </table>

                <div class="head">
                    <p>
                        <img src="/images/giftbox.png">
                        کارت هدیه
                    </p>
                </div>

                <table class="digibon">

                    <tbody>
                    <tr>
                        <td>

                            <p>
                                کارت هدیه دیجی کالا دارم
                            </p>

                            <span class="text">
                          اگر مایل هستید از کارت هدیه دیجی کالا استفاده کنید، کافیست کد آن را وارد کرده و با انتخاب دکمه ثبت مبلغ آن از هزینه قابل پرداخت شما کسر می شود:
                                </span>

                        </td>
                        <td>
                            <input>
                        </td>
                        <td>
                            <a class="blue-btn">
                                ثبت کارت هدیه
                            </a>
                        </td>
                    </tr>
                    </tbody>

                </table>

                <div class="total-price">

                    <div class="right">
                        مبلغ قابل پرداخت
                    </div>

                    <div class="left">

                        <p id="final-price"
                           data-amount="{{ \Cart::totalAmount() + getSetting('post_price') }}">{{ number_format(\Cart::totalAmount() + getSetting('post_price')) }}</p>
                        <span>تومان</span>

                    </div>

                </div>

                <div class="head">
                    <p>
                        <i></i>
                        شیوه پرداخت
                    </p>
                </div>

                <table class="pay-way active" cellspacing="0">

                    <tbody>
                    <tr>
                        <td class="online-pay act" onclick="chooseOnlinePay();">
                            <span class="payment"></span>
                        </td>

                        <td>

                            <p class="title">
                                پرداخت اینترنتی
                            </p>

                            <ul class="pay-choose">
                                <li class="bank-li active pay-g" onclick="choosePaymentDriver(this);" data-name="saman">
                                    <i class="bank"></i>
                                    <p>
                                        درگاه پرداخت اینترنتی بانک سامان
                                    </p>
                                </li>

                                <li class="bank-li pay-g" onclick="choosePaymentDriver(this);" data-name="zarrinpal">
                                    <i class="bank"></i>
                                    <p>
                                        درگاه پرداخت اینترنتی زرین پال
                                    </p>
                                </li>
                            </ul>

                        </td>

                        <td>
                            <img src="/images/mobile.png">
                            <a>
                                با پرداخت از درگاه سامان برنده جوایز ارزنده آن باشید
                            </a>
                        </td>
                    </tr>
                    </tbody>

                </table>

                <table class="pay-way pay-g" cellspacing="0" data-name="cash">

                    <tbody>
                    <tr>
                        <td class="cash-pay act" onclick="chooseCashPay();">
                            <span class="payment"></span>
                        </td>

                        <td>

                            <p class="title">
                                پرداخت در محل
                            </p>

                            <span>
                            شما می‌توانید بعد از دریافت سفارش خود اقدام به پرداخت هزینه ی آن کنید.
                        </span>

                        </td>
                    </tr>
                    </tbody>

                </table>

                <div class="buttons">

                    <a href="{{ route('cart-review') }}" class="gray-btn">
                        بازگشت
                    </a>

                    <form action="{{ route('payment.order') }}" method="post" id="order-reg">
                        @csrf
                        <span class="blue-btn icon" onclick="setAmountSession(); $('#order-reg').submit();">
                            پرداخت و تکمیل خرید
                        </span>
                    </form>

                    <div class="agree">

                        <p>
                            با انتخاب دکمه (پرداخت و تکمیل خرید) موافقت خود را با
                            <a>
                                شرایط و قوانین
                            </a>
                            مربوط به ثبت و رویه های پردازش سفارشات دیجی کالا، اعلام نموده اید.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>

        /*Check Discount Code and add it to Cart Final Price*/
        function checkCode() {

            var codeInput = $('.discount-code');
            var code = codeInput.val();
            var finalPrice = $('#final-price');

            var url = '/orders/check-code';
            var data = {'code': code};

            $.post(url, data, function (msg) {
                if (msg['status'] === 'قابل استفاده') {
                    codeInput.removeClass('false').addClass('true');
                    $('.code-status.false').text('');
                    $('.code-status.true').text('کد تخفیف با موفقیت اعمال شد.');

                    var finalPriceWithCode = finalPrice.data('amount') - msg['amount'];
                    finalPrice.text(itpro(finalPriceWithCode));

                } else {
                    codeInput.removeClass('true').addClass('false');
                    $('.code-status.true').text('');
                    $('.code-status.false').text('کد تخفیف وارد شده، ' + msg['status'] + ' است.');

                    finalPrice.text(itpro(finalPrice.data('amount')));
                }
            });
        }

        var payWay = $('.pay-way');
        var bank = $('.bank-li');
        var onlinePay = $('.online-pay.act').parents(payWay);
        var cashPay = $('.cash-pay.act').parents(payWay);


        function chooseOnlinePay() {
            onlinePay.addClass('active');
            cashPay.removeClass('active');
            bank.removeClass('active');
            bank.eq(0).addClass('active');
        }

        function chooseCashPay() {
            cashPay.addClass('active');
            onlinePay.removeClass('active');
            bank.removeClass('active');
        }

        function choosePaymentDriver(tag) {
            onlinePay.addClass('active');
            cashPay.removeClass('active');
            bank.removeClass('active');
            $(tag).addClass('active');
        }


        function setAmountSession() {

            var payGateway = $('.pay-g.active').data('name');
            var url = '/orders/order-amount';
            var data = {payGateway};

            $.ajax({

                type: 'POST',
                data: data,
                url: url,
            });
        }

    </script>
@endcomponent
