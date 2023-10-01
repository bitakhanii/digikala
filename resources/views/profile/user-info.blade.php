@component('layouts.content')
    <script src="/bootstrap/bootstrap.min.js"></script>
    <link href="/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="/bootstrapSelect/bootstrap-select.js"></script>
    <link href="/bootstrapSelect/bootstrap-select.css" rel="stylesheet">

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

        .row .value input[type=text], input[type=email] {
            width: 250px;
            height: 33px;
            border: 1px solid #aabee7;
            border-radius: 3px;
            color: #3a4a75;
            font-size: 10pt;
        }

        .row .value select {
            width: 85px;
            margin-right: 10px;
        }

        .row .value textarea {
            width: 280px;
            height: 150px;
            border: 1px solid #aabee7;
            vertical-align: top;
        }

        .row .value span {
            color: #505050;
            font-size: 10pt;
        }

        .row p {
            float: right;
            color: #313131;
            margin: 0;
        }

        .button {
            text-align: center;
        }

        .blue-btn {
            display: inline-block;
            float: none;
            margin-top: 50px;
        }

        .bootstrap-select {
            margin-left: 10px !important;
            width: 110px !important;
        }

        .btn.dropdown-toggle.btn-default {
            height: 32px !important;
            padding-top: 4px !important;
        }

        .bootstrap-select.btn-group .dropdown-toggle .filter-option {
            font-size: 10pt !important;
        }

        .dropdown-menu {
            font-size: 11px !important;
        }

        .dropdown-menu.open {
            overflow: auto !important;
            overflow-y: scroll;
            max-height: 350px !important;
        }

        .dropdown-menu.inner {
            overflow-y: unset !important;
        }

        html {
            font-size: unset !important;
        }

    </style>

    <div id="main">

        <form action="{{ route('profile.update' , $user) }}" method="post" id="info-form">
            @csrf
            @method('patch')

            @include('layouts.errors')

            <div id="main-content">

                <h3>
                    ثبت اطلاعات شناسایی
                </h3>

                <div class="row">
            <span class="title">
                ایمیل:
            </span>
                    <span class="value">
                <input class="left" type="email" name="email" value="{{ old('email' , $user->email) }}">
            </span>
                </div>

                @php
                    $name = explode('-' , $user->name);
                    @$fName = $name[0];
                    @$lName = $name[1];
                @endphp

                <div class="row">
            <span class="title">
                نام:
            </span>
                    <span class="value">
                <input type="text" name="first_name" value="{{ old('first_name' , $fName) }}">
            </span>
                </div>

                <div class="row">
            <span class="title">
                نام خانوادگی:
            </span>
                    <span class="value">
                <input type="text" name="last_name" value="{{ old('last_name' , $lName) }}">
            </span>
                </div>

                <div class="row">
            <span class="title">
                شماره تلفن همراه:
            </span>
                    <span class="value">
                <input type="text" id="mobile" class="left" name="mobile"
                       value="{{ old('mobile' , engToPersian($user->mobile)) }}">
            </span>
                </div>

                @php
                    $jalaliBirth = jdate($user->dob)->format('Y-m-d');
                        $dob = explode('-' , $jalaliBirth);
                        @$birthYear = $dob[0];
                        @$birthMonth = $dob[1];
                        @$birthDay = $dob[2];
                @endphp

                <div class="row">
            <span class="title">
                تاریخ تولد:
            </span>
                    <span class="value">

                <span>
                    روز:
                </span>

                <select name="birth_day" class="selectpicker">
                    @for($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}" class="left"
                                @if(!is_null($user->dob) && $i == $birthDay) selected="selected" @endif>{{ engToPersian($i) }}</option>
                    @endfor
                </select>
            </span>

                    <span class="value">

                <span>
                    ماه:
                </span>

                <select name="birth_month" class="selectpicker">
                    @php
                        $monthes = [1 => 'فروردین', 2 => 'اردیبهشت', 3 => 'خرداد', 4 => 'تیر', 5 => 'مرداد', 6 => 'شهریور', 7 => 'مهر', 8 => 'آبان', 9 => 'آذر', 10 => 'دی', 11 => 'بهمن', 12 => 'اسفند'];
                    @endphp
                    @for($i = 1; $i <= 12; $i++)
                        <option @if(!is_null($user->dob) && $i == $birthMonth) selected="selected"
                                @endif value="{{ $i }}">{{ $monthes[$i] }}</option>
                    @endfor
                </select>
            </span>

                    <span class="value">

                <span>
                    سال:
                </span>

                <select name="birth_year" class="selectpicker" style="">
                    @php
                        $thisYear = jdate()->format('Y');
                        $twoYearsAgo = $thisYear - 2;
                    @endphp
                    @for($i = 1300; $i <= $twoYearsAgo; $i++)
                        <option class="left" @if($i == $birthYear) selected="selected"
                                @endif value="{{ $i }}">{{ engToPersian($i) }}</option>
                    @endfor
                </select>
            </span>
                </div>

                <div class="row">
            <span class="title">
                جنسیت:
            </span>
                    <span class="value">

                <span>
                    زن
                </span>

                <input value="female" type="radio" name="sex" @if($user->sex == 'female') checked @endif>
            </span>

                    <span class="value">

                <span>
                    مرد
                </span>

                <input value="male" type="radio" name="sex" @if($user->sex == 'male') checked @endif>
            </span>
                </div>

                <div class="row">
            <span class="title">
                کد منطقه:
            </span>
                    <span class="value">
                <input type="text" id="area-code" class="left" name="area_code"
                       value="{{ old('area_code' , engToPersian($user->area_code)) }}">
            </span>
                </div>

                <div class="row">
            <span class="title">
                شماره تلفن ثابت:
            </span>
                    <span class="value">
                <input type="text" id="tel" class="left" name="phone"
                       value="{{ old('phone' , engToPersian($user->phone)) }}">
            </span>
                </div>

                <div class="row">
            <span class="title">
                محل سکونت:
            </span>
                    <span class="value">
                    <textarea name="address">{{ old('address' , $user->address) }}</textarea>
            </span>
                </div>

                <div class="row">
            <span class="title">
                کد ملی:
            </span>
                    <span class="value">
                <input type="text" id="national-code" class="left" name="national_code"
                       value="{{ old('national_code' , engToPersian($user->national_code)) }}">
            </span>
                </div>

                <div class="row">
            <span class="title">
                شماره کارت:
            </span>
                    <span class="value">
                <input type="text" id="card-num" class="left" name="credit_card"
                       value="{{ old('credit_card' , engToPersian( $user->credit_card)) }}">
            </span>
                </div>

                <div class="row">

                    <p>
                        آیا مایل به دریافت خبرنامه های دیجی کالا می باشید؟
                    </p>

                    <span class="value">

                <span>
                    بله
                </span>

                <input value="1" type="radio" name="newsletter" @if($user->newsletter == '1') checked @endif>
            </span>

                    <span class="value">

                <span>
                    خیر
                </span>

                <input value="0" type="radio" name="newsletter" @if($user->newsletter == '0') checked @endif>
            </span>

                </div>

                <div class="button">

                    <button class="blue-btn">
                        ثبت اطلاعات
                    </button>

                </div>

            </div>

        </form>

    </div>
@endcomponent
