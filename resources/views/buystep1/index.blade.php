@component('layouts.content')

    <style>

        #main {
            width: 1200px;
            background-color: #fff;
            margin: 10px auto;
            box-shadow: 0 2px 3px rgba(0, 0, 0, .08);
            border-radius: 3px;
            overflow: hidden;
        }

        #main::after {
            content: "";
            display: block;
            clear: both;
        }

        #login {
            width: 270px;
            float: right;
            margin: 80px 140px 0 0;
        }

        #login , #register {
            text-align: center;
        }

        #login i, #register i {
            width: 53px;
            height: 53px;
            display: block;
            margin: auto;
            background: url(/images/slices.png) -795px -21px;
        }

        #login b, #register b {
            font-size: 12pt;
            font-weight: normal;
            font-family: yekan-exbold;
            color: #838383;
            margin: 20px 0 6px 0;
            text-align: center;
            float: right;
            width: 100%;
        }

        #login p, #register p {
            color: #939393;
            text-align: center;
            float: right;
            margin: 0;
            width: 100%;
            font-size: 10.8pt;
        }

        #login .blue-btn , #register .blue-btn {
            float: none;
            display: inline-block;
            margin: 15px 0;
        }

        #register {
            width: 500px;
            float: left;
            padding: 0 85px 50px 85px;
            margin: 65px 0;
            border-right: 1px solid #ededed;
        }

        #register i {
            background-position: -795px -90px;
        }

        #register .green-btn {
            margin: 22px 0 30px 144px;
        }

        #register .description {
            font-size: 11pt;
        }

    </style>

    <div id="main">

        <div class="buy-steps">

            <div class="dash active">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul>
                <li class="half-active">
                    <span></span>
                    <div></div>
                    <p class="active">
                        ورود به دیجی کالا
                    </p>
                </li>

                <li>
                    <span></span>
                    <div></div>
                    <p>
                        اطلاعات ارسال سفارش
                    </p>
                </li>

                <li>
                    <span></span>
                    <div></div>
                    <p>
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

        <div id="login">

            <i></i>

            <b>
                عضو دیجی کالا هستید؟
            </b>

            <p>
                برای تکمیل فرایند خرید خود وارد شوید
            </p>

            <a class="blue-btn" href="{{ route('login') }}">
                ورود به دیجی کالا
            </a>

        </div>
        <div id="register">

            <i></i>

            <b>
                تازه وارد هستید؟
            </b>

            <p>
                برای تکمیل فرایند خرید خود ثبت نام کنید
            </p>

            <a class="blue-btn" href="{{ route('register') }}">
                ثبت نام در دیجی کالا
            </a>

            <p class="description">
                با عضویت در دیجی کالا تجربه متفاوتی از خرید اینترنتی داشته باشید. وضعیت سفارش خود را پیگیری نموده و سوابق
                خریدتان را مشاهده کنید.
            </p>

        </div>

    </div>

@endcomponent
