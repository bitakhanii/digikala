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
            padding: 20px;
        }

        #main-content h3 {
            font-size: 12pt;
            font-weight: normal;
            font-family: yekan-exbold;
            color: #6589de;
            background-color: #e5edf9;
            padding: 10px 20px;
            border-radius: 3px;
        }

        #main-content .row {
            padding: 20px;
            color: #5b78c4;
        }

        .row .title {
            border-bottom: 1px solid #5b78c4;
            background-color: #ebf3ff;
            border-radius: 2px;
            width: 200px;
            display: inline-block;
            text-align: center;
            font-size: 10.5pt;
        }

        .row .value {
            margin-right: 50px;
        }

        .row .value input {
            width: 250px;
            height: 26px;
            border: 1px solid #aabee7;
            border-radius: 3px;
        }

        #error {
            border: 3px solid #de0000;
            text-align: center;
            border-radius: 3px;
            font-size: 12pt;
            padding: 20px;
            color: #de0000;
        }

        #success {
            border: 3px solid #4dbe7a;
            text-align: center;
            border-radius: 3px;
            font-size: 12pt;
            padding: 20px;
            color: #4dbe7a;
        }

        .button {
            text-align: center;
        }

        .blue-btn {
            display: inline-block;
            float: none;
            margin-top: 50px;
        }

    </style>

    <div id="main">

        <form action="{{ route('password.update') }}" method="post" id="pass-form">
            @csrf
            @method('put')

            @include('layouts.errors')

            <div id="main-content">

                <h3>
                    تغییر رمز عبور پنل کاربری
                </h3>

                <div class="row">
            <span class="title">
                رمز عبور فعلی:
            </span>
                    <span class="value">
                <input id="current_password" type="text" name="current_password">

            </span>
                </div>

                <div class="row">
            <span class="title">
                رمز عبور جدید:
            </span>
                    <span class="value">
                <input type="password" name="password">
            </span>
                </div>

                <div class="row">
            <span class="title">
                تکرار رمز عبور جدید:
            </span>
                    <span class="value">
                <input type="password" name="password_confirmation">
            </span>
                </div>

                <div class="button">

                    <button type="submit" class="blue-btn">
                        ثبت اطلاعات
                    </button>

                </div>

            </div>

        </form>

    </div>
@endcomponent
