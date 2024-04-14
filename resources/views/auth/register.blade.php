@component('layouts.content')
    <style>

        #main {
            width: 1200px;
            margin: 10px auto;
        }

        #register {
            background-color: #fff;
            border-radius: 4px;
            margin: 10px 0;
            padding: 35px 120px;
        }

        #register .header {
            height: 125px;
            background-color: #fafcfc;
        }

        #register .header i {
            width: 65px;
            height: 53px;
            display: block;
            background: url(/images/slices.png) -870px -90px;
            margin: auto;
        }

        #register .header h2 {
            font-family: yekan-bold;
            font-size: 14pt;
            color: #5E6464;
            text-align: center;
            font-weight: normal;
            margin: 10px 0;
        }

        #register .content::after {
            content: "";
            display: block;
            clear: both;
        }

        .content-right {
            width: 410px;
            float: right;
        }

        .content-right .password {
            position: relative;
        }

        .content-right .password i {
            position: absolute;
            right: 130px;
            top: 38px;
            font-size: 10pt;
            color: #b5b5b5;
            cursor: pointer;
        }

        .content-right .password .fa-eye-slash {
            display: none;
        }

        .content-right label {
            color: #555A5A;
            width: 120px;
            display: inline-block;
            font-size: 9pt;
        }

        .content-right .email input, .content-right .password input, .content-right .name input, .content-right .last-name input {
            width: 255px;
            height: 32px;
            border: 1px solid #e5eeee;
            text-align: left;
            padding-left: 20px;
            color: #818A8A;
            border-radius: 3px;
            outline: none;
            margin-top: 30px;
        }

        #register input[type=text]:focus {
            border: 2px solid #208de6;
        }

        #register input[type=password]:focus {
            border: 2px solid #208de6;
        }

        .terms {
            margin-top: 30px;
            position: relative;
            line-height: 30px;
        }

        .terms input {
            z-index: 2;
            position: relative;
            opacity: 0;
            margin-left: 8px;
            top: 5px;
            right: -1px;
            cursor: pointer;
            width: 16px;
            height: 16px;
            float: right;
        }

        .terms p {
            margin: 0;
            color: #555A5A;
            font-size: 9pt;
        }

        .terms a {
            color: #2196f3;
            border-bottom: 1px dashed #2196f3;
            cursor: pointer;
            font-size: 9pt;
        }

        .content-left {
            width: 500px;
            float: left;
            margin-top: 100px;
            border-right: 1px solid #eeedec;
        }

        .content-left ul {
            padding: 0 50px;
        }

        .content-left li {
            margin-top: 10px;
            color: #7E8383;
            cursor: default;
            font-size: 9pt;
        }

        .content-left i {
            width: 28px;
            height: 28px;
            display: inline-block;
            background: url(/images/slices.png);
            position: relative;
            top: 8px;
            margin-left: 25px;
        }

        #login {
            background-color: rgb(241, 255, 244);
            border-radius: 4px;
            padding: 18px 0;
        }

        #login p {
            margin: 0;
            color: #49571F;
            text-align: center;
            font-size: 10.5pt;
        }

        #login a {
            color: #1E8024;
            margin-right: 10px;
            border-bottom: 1px dotted #1E8024;
            cursor: pointer;
        }

    </style>

    <div id="main">

        <div id="navigation-bar" class="bxshad04">
            <span></span>

            <ul>
                <li>
                    <a href="{{ route('index') }}">فروشگاه اینترنتی دیجی کالا</a>
                    <span></span>
                </li>

                <li>
                    <a>ثبت نام در دیجی کالا</a>
                </li>
            </ul>
        </div>

        <div id="register" class="bxshad04">

            <div class="header">
                <i></i>

                <h2>
                    به دیجی کالا بپیوندید
                </h2>
            </div>

            <div class="content">
                <form id="register-form" method="post">
                    @csrf

                    <div class="content-right">

                        <div class="name">
                            <label>
                                نام
                            </label>

                            <input class="@error('name') is-invalid @enderror" type="text" placeholder="Name"
                                   name="name" value="{{ old('name') }}">
                            <x-input-error :messages="$errors->get('name')" class="error"/>
                        </div>

                        <div class="last-name">
                            <label>
                                نام خانوادگی (اختیاری)
                            </label>

                            <input class="@error('last_name') is-invalid @enderror" type="text" placeholder="Last Name"
                                   name="last_name" value="{{ old('last_name') }}">
                            <x-input-error :messages="$errors->get('last_name')" class="error"/>
                        </div>

                        <div class="email">
                            <label>
                                پست الکترونیک
                            </label>

                            <input class="@error('email') is-invalid @enderror" type="text" placeholder="Email"
                                   name="email" value="{{ old('email') }}">
                            <x-input-error :messages="$errors->get('email')" class="error"/>
                        </div>

                        <div class="password">
                            <label>
                                کلمه عبور
                            </label>

                            <input class="@error('password') is-invalid @enderror" id="password" type="password"
                                   placeholder="Password" name="password">
                            <x-input-error :messages="$errors->get('password')" class="error"/>
                            <i class="fa-solid fa-eye" onclick="showPassword(this);"></i>
                            <i class="fa-solid fa-eye-slash" onclick="showPassword(this);"></i>
                        </div>

                        <div class="password">
                            <label>
                                تکرار کلمه عبور
                            </label>

                            <input class="@error('password_confirmation') is-invalid @enderror" id="password"
                                   type="password" placeholder="Password" name="password_confirmation">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="error"/>
                            <i class="fa-solid fa-eye" onclick="showPassword(this);"></i>
                            <i class="fa-solid fa-eye-slash" onclick="showPassword(this);"></i>
                        </div>

                        <!-- Google Recaptcha -->
                        @recaptcha
                        <x-input-error :messages="$errors->get('g-recaptcha-response')" class="error"/>

                        <div class="terms check1">
                            <span class="check-box checked"></span>
                            <input type="checkbox" checked name="terms" onclick="checkBox(this , 'check1');">
                            <p>
                                <a>
                                    حریم خصوصی
                                </a>
                                و
                                <a>
                                    شرایط و قوانین
                                </a>
                                استفاده از سرویس های سایت دیجی کالا را مطالعه نموده و با کلیه مواردآن موافقم.
                            </p>
                        </div>
                        <x-input-error :messages="$errors->get('terms')" class="error"/>

                        <div class="terms check2" style="margin-bottom: 20px;">

                            <p>
                                <span class="checked check-box"></span>
                                <input type="checkbox" name="newsletter" onclick="checkBox(this , 'check2');" checked>
                                <x-input-error :messages="$errors->get('newsletter')" class="error"/>
                                خبرنامه دیجی کالا را برای من ارسال کنید.
                            </p>

                        </div>

                        <button class="blue-btn" style="float: none;">
                            ثبت نام در دیجی کالا
                        </button>

                        <a href="{{ route('auth.google') }}">
                            <img style="width: 200px; float: left; cursor:pointer;" src="/images/google-signin.png">
                        </a>

                    </div>

                </form>

                <div class="content-left">

                    <ul>
                        <li>

                            <i style="background-position: -980px -330px;"></i>
                            سریع تر و ساده تر خرید کنید

                        </li>

                        <li>

                            <i style="background-position: -980px -285px;"></i>
                            به سادگی سوابق خرید و فعالیت های خود را مدیریت کنید

                        </li>

                        <li>

                            <i style="background-position: -980px -243px;"></i>
                            لیست علاقه مندی های خود را بسازید و تغییرات آنها را دنبال کنید

                        </li>

                        <li>

                            <i style="background-position: -980px -200px;"></i>
                            نقد، بررسی و نظرات خود را با دیگران به اشتراک گذارید

                        </li>

                        <li>

                            <i style="background-position: -980px -162px;"></i>
                            در جریان فروش های ویژه و قیمت روز محصولات قرار بگیرید

                        </li>

                    </ul>

                </div>
            </div>

        </div>

        <div id="login" class="bxshad04">
            <p>
                قبلا در دیجی کالا ثبت نام کرده اید؟
                <a href="{{ route('login') }}">ورود به دیجی کالا</a>
            </p>
        </div>

    </div>

@endcomponent
