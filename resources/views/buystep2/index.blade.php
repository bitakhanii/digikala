@component('layouts.content')

    <script src="/frotel/ostan.js"></script>
    <script src="/frotel/city.js"></script>

    <script src="/bootstrap/bootstrap.min.js"></script>
    <link href="/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="/bootstrapSelect/bootstrap-select.js"></script>
    <link href="/bootstrapSelect/bootstrap-select.css" rel="stylesheet">

    <style>

        table {
            border-collapse: unset !important;
        }

        #main {
            width: 1200px;
            margin: 10px auto;
        }

        .main-content {
            box-shadow: 0 2px 3px rgba(0, 0, 0, .08);
            margin: 10px 0;
            float: right;
            border-radius: 3px;
            overflow: hidden;
        }

        #buy-step2 {
            background-color: #fff;
            padding: 60px 15px;
            float: right;
            width: 1170px;
        }

        #buy-step2 .head {
            margin-bottom: 30px;
            float: right;
            width: 100%;
        }

        #buy-step2 .head > p {
            margin: 5px 0 0 0;
            font-size: 12pt;
            color: #393939;
            float: right;
        }

        #buy-step2 .head > p i {
            width: 5px;
            height: 8px;
            display: inline-block;
            background: url(/images/slices.png) -37px -652px;
            margin-left: 12px;
        }

        .address-table {
            width: 100%;
            border: 1px solid #e9e9e9;
            margin-bottom: 10px;
            border-radius: 3px;
            overflow: hidden;
        }

        .address-table.active {
            border: 1px solid #a0d99b;
        }

        .address-table tr {
            font-size: 9.5pt;
            color: #636363;
        }

        .address-table tr:first-child {
            font-size: 13pt;
        }

        .address-table td {
            padding: 15px 30px 18px 0;
            border-left: 1px solid #e9e9e9;
            border-top: 1px solid #e9e9e9;
        }

        .address-table tr:first-child td {
            border-top: 0;
        }

        .address-table .click-to-active {
            padding: 0;
            cursor: pointer;
            width: 60px;
            position: relative;
        }

        .address-table.active .click-to-active {
            border-left: 1px solid #a0d99b;
            background-color: #f7fff7;
        }

        .address-table.active .click-to-active::before {
            content: '';
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 38px 38px 0;
            border-color: transparent #79cd71 transparent transparent;
            position: absolute;
            top: 0;
        }

        .address-table.active .click-to-active::after {
            content: '';
            width: 15px;
            height: 15px;
            display: block;
            background: url(/images/slices.png) -813px -475px;
            position: absolute;
            top: 0;
        }

        .address-table tr:first-child td:last-child {
            padding: 0;
            border-left: 0;
            width: 40px;
        }

        .address-table .click-to-active span {
            width: 17px;
            height: 17px;
            display: block;
            background: url(/images/slices.png) -344px -190px;
            margin: auto;
        }

        .address-table.active .click-to-active span {
            background-position: -344px -219px;
        }

        .address-table .icons {
            height: 169px;
            border: 0;
            margin: 0;
        }

        .address-table .icons td {
            cursor: pointer;
            border-left: 0 !important;
        }

        .address-table .icons tr:first-child td {
            background-color: #d5efff;
        }

        .address-table .icons tr:last-child td {
            background-color: #ffece8;
        }

        .address-table .icons a {
            width: 16px;
            height: 16px;
            display: block;
            margin: auto;
            background: url(/images/slices.png);
        }

        .address-table .icons tr:first-child td a {
            background-position: -809px -446px;
        }

        .address-table .icons tr:last-child td a {
            background-position: -811px -510px;
        }

        .address-table .icons #delete-address {
            margin: 0;
        }

        .juridical-person {
            width: 100%;
            border: 1px solid #f2f2f2;
            border-radius: 3px;
            margin-bottom: 60px;
        }

        .juridical-person tr {
            font-size: 10.5pt;
            color: #636363;
        }

        .juridical-person td {
            border-right: 1px solid #f2f2f2;
            padding: 25px 45px 25px 0;
        }

        .juridical-person td:first-child {
            border-right: 0;
        }

        .juridical-person td a {
            color: #2196f3;
            border-bottom: 1px dashed #2196f3;
            cursor: pointer;
        }

        .way-of-send {
            width: 100%;
            border: 1px solid #f2f2f2;
            border-radius: 3px;
            margin-bottom: 12px;
        }

        .way-of-send.active {
            border: 1px solid #a0d99b;
        }

        .way-of-send td {
            border-right: 1px solid #f2f2f2;
            padding: 15px 35px 15px 0;
        }

        .way-of-send td:first-child {
            border-right: none;
        }

        .way-of-send td:last-child {
            padding: 0 20px;
            text-align: center;
            font-size: 10pt;
        }

        .way-of-send.active td:last-child {
            background-color: #f9fff9;
        }

        .way-of-send .click-to-active {
            padding: 0;
            cursor: pointer;
            width: 60px;
        }

        .way-of-send.active .click-to-active {
            border-left: 1px solid #a0d99b;
            background-color: #f7fff7;
        }

        .way-of-send .click-to-active span {
            width: 17px;
            height: 17px;
            display: block;
            background: url(/images/slices.png) -344px -190px;
            margin: auto;
        }

        .way-of-send.active .click-to-active span {
            background-position: -344px -219px;
        }

        .way-of-send td i {
            width: 65px;
            height: 48px;
            float: right;
            background: url(/images/slices.png) -875px -429px;
            margin-left: 20px;
        }

        .way-of-send td i.blue {
            background: url(/images/slices.png) -875px -359px;
        }

        .way-of-send td:nth-child(2) p {
            font-size: 11.5pt;
            color: #646464;
            margin: 0;
            float: right;
            width: 620px;
        }

        .way-of-send td:nth-child(2) span {
            font-size: 9.5pt;
            color: #909090;
            margin: 5px 0;
            float: right;
        }

        .way-of-send td:last-child p {
            font-size: 10.5pt;
            color: #6d6d6d;
            margin: 0 0 7px 0;
            text-align: center;
            width: 100px;
        }

        .way-of-send td:last-child .price {
            font-size: 11.4pt;
            color: #1ba851;
            font-weight: bold;
        }

        .way-of-send td:last-child .text {
            color: #1ba851;
        }

        .send-factor {
            margin: 20px 0 150px 0;
            float: right;
            width: 100%;
        }

        .send-factor > p {
            margin: 5px 0 0 0;
            font-size: 10pt;
            color: #393939;
            float: right;
        }

        .send-factor > p i {
            width: 5px;
            height: 8px;
            display: inline-block;
            background: url(/images/slices.png) -37px -652px;
            margin-left: 12px;
        }

        .send-factor .sort {
            float: right;
        }

        .send-factor .sort ul {
            padding: 0;
            margin: 10px 20px 0 0;
            float: right;
        }

        .send-factor .sort li {
            float: right;
            margin-left: 12px;
            cursor: pointer;
        }

        .send-factor .sort li:last-child {
            margin-left: 0;
        }

        .send-factor .sort li p {
            font-size: 9pt;
            color: #393939;
            margin: 0;
            float: right;
        }

        .send-factor .sort li i {
            width: 17px;
            height: 16px;
            float: right;
            background: url(/images/slices.png) -345px -190px;
            margin-left: 4px;
        }

        .send-factor .sort li.active i {
            background-position: -344px -219px;
        }

        #buy-step2 .buttons {
            width: 100%;
            float: right;
        }

        .blue-btn.icon i {
            margin-right: 10px;
            width: 12px;
            height: 12px;
            float: left;
        }

        .next-level {
            float: left;
            font-size: 9.2pt;
            color: #4b4b4b;
            margin-top: 10px;
        }

        .address-window {
            width: 670px;
            background-color: #fff;
            padding: 0 0 10px 0;
        }

        .address-window h4 {
            background-color: #f3f3f3;
            margin: 0 0 35px 0;
            padding: 0 15px;
            font-size: 10pt;
            font-weight: normal;
            color: #5F5F5F;
            line-height: 45px;
        }

        .address-window h4 .close-modal {
            width: 28px;
            height: 28px;
            background: url(/images/slices.png) -134px -123px;
            float: left;
            border: 1px solid #d5d5d5;
            border-radius: 100%;
            margin-top: 8px;
            cursor: pointer;
            opacity: 1;
        }

        .address-window .row {
            padding: 5px 20px;
            margin: 0;
        }

        .address-window .row p {
            margin: 6px 0 0 0;
            font-size: 10pt;
            color: #535353;
            float: right;
            width: 220px;
        }

        .address-window .row input {
            border: 1px solid #dcdcdc;
            border-radius: 3px;
            width: 200px;
            height: 35px;
            color: #666666;
            padding: 0 20px;
            font-size: 10pt;
            outline: none;
        }

        .address-window .row input:focus {
            border: 2px solid #208de6;
        }

        .address-window .row:nth-child(4) input {
            text-align: left;
            direction: ltr;
            padding: 0 25px 0 25px;
            width: 190px;
            outline: none;
        }

        .address-window .row .phone {
            width: 130px;
            text-align: left;
        }

        .address-window .row .area-code {
            width: 45px;
            padding: 0 5px;
            text-align: left;
        }

        .address-window .row span {
            font-size: 9.5pt;
        }

        .address-window .row textarea {
            width: 350px;
            padding: 10px 18px;
            border: 1px solid #dcdcdc;
            height: 75px;
            color: #878787;
            font-size: 10pt;
            border-radius: 3px;
            max-height: 250px;
            max-width: 300px;
            outline: none;
        }

        .address-window .row textarea:focus {
            border: 2px solid #208de6;
        }

        .address-window #zip-code {
            text-align: left;
        }

        .bootstrap-select {
            width: 180px !important;
        }

        .btn.dropdown-toggle.btn-default {
            border-radius: 2px;
        }

        .btn-default {
            border-color: #ebebeb !important;
        }

        .caret {
            border: 0;
            background: url(/images/slices.png) -31px -460px;
            width: 20px;
            height: 20px;
            top: 34% !important;
            right: 148px !important;
        }

        .bootstrap-select.open .caret {
            background-position: -30px -750px;
        }

        .btn {
            padding-right: 15px !important;
            color: #828282;
        }

        .address-window .row:nth-child(6) .city .bootstrap-select.btn-group .dropdown-menu li:first-child a {
            color: #828282;
        }

        .address-window .row:nth-child(7) .bootstrap-select.btn-group .dropdown-menu li:first-child a {
            color: #828282;
        }

        .address-window .row:nth-child(7) .btn.dropdown-toggle.btn-default {
            background-color: #f4f4f4 !important;
            border: none !important;
        }

        .address-window .row:nth-child(7) .btn-group.bootstrap-select {
            width: 250px !important;
        }

        .btn-group.open .dropdown-toggle {
            box-shadow: none !important;
        }

        .btn-default:hover, .btn-default:focus, .btn-default.focus, .btn-default:active, .btn-default.active, .open > .dropdown-toggle.btn-default {
            background-color: #fafafa;
            border-color: #e1e1e1 !important;
            color: #828282;
        }

        .dropdown-menu {
            background-color: #fafafa;
            width: 200px;
            margin-top: -1px;
            border-radius: 2px;
        }

        .dropdown-menu.open {
            box-shadow: 2px 1px 0 #000;
            padding: 0;
        }

        .bootstrap-select.btn-group .dropdown-menu li a {
            color: #828282;
        }

        .dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {
            background-color: rgb(33, 150, 243);
            color: #fff !important;
        }

        .dropdown-header {
            color: #d2d2d2 !important;
            font-size: 10pt !important;
        }

        .bootstrap-select.btn-group .dropdown-menu li:first-child a {
            color: #fff;
        }

        .dropdown-menu > li > a {
            padding: 5px 10px;
        }

        .address-window .row:nth-child(7) .caret {
            right: 220px !important;
        }

        .bootstrap-select.btn-group .dropdown-menu li:first-child a {
            color: #494949;
        }

        .btn.dropdown-toggle.btn-default {
            font-size: 8.5pt !important;
            height: 30px !important;
        }

        .dropdown-menu {
            font-size: 11px !important;
        }

        .dropdown-menu.open {
            overflow: auto !important;
            overflow-y: scroll;
            max-height: 300px !important;
        }

        .dropdown-menu.inner {
            overflow-y: unset !important;
        }

        html {
            font-size: unset !important;
        }

    </style>

    <div id="main">

        <div class="main-content">

            @include('buystep2.create-address')

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

                    <li class="half-active">
                        <span></span>
                        <div></div>
                        <p class="active">
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

            <div id="buy-step2">

                <div class="head">

                    <p>
                        <i></i>
                        انتخاب آدرس
                    </p>

                    <button class="gray-btn" data-toggle="modal" data-target="#create-address">
                        افزودن آدرس جدید
                    </button>

                </div>

                @foreach($addresses as $address)

                    @include('buystep2.edit-address')

                    @php
                        $name = explode('-', $address->name);
                    @endphp

                    <table data-id="{{ $address->id }}" data-select="{{ $selectedAddress }}"
                           class="address-table @if($selectedAddress == $address->id) active @endif" cellspacing="0">

                        <tbody>
                        <tr>
                            <td class="click-to-active" rowspan="3" onclick="chooseAddress(this);">
                                <span></span>
                            </td>
                            <td colspan="3">{{ $name[0] . ' ' . $name[1]  }}</td>
                            <td rowspan="3">

                                <table class="icons" cellspacing="0">
                                    <tr>
                                        <td onclick="editAddress({{ $address->id }}); setEditRoute({{ $address->id }});">
                                            <a></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td onclick="$(this).find('#delete-address').submit();">
                                            <form id="delete-address"
                                                  action="{{ route('addresses.destroy', $address->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a></a>
                                            </form>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                استان: {{ $address->state_name }}
                            </td>
                            <td rowspan="2">
                                {{ $address->address }}
                            </td>
                            <td>
                                شماره تماس اضطراری: {{ $address->mobile }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                شهر: {{ $address->city_name }}
                            </td>
                            <td>
                                شماره تماس ثابت: @if($address->phone)
                                    {{ $address->phone }}-{{ $address->area_code }}
                                @else
                                    ثبت نشده
                                @endif
                            </td>
                        </tr>
                        </tbody>

                    </table>

                    @php
                        // TODO make post system
                    @endphp

                    @php

                        @endphp
                @endforeach

                <div class="head" style="margin-top: 70px;">

                    <p>
                        <i></i>
                        شخص حقوقی هستید؟
                    </p>

                </div>

                <table class="juridical-person" cellspacing="0">

                    <tbody>
                    <tr>
                        <td></td>
                        <td>
                            در صورتی که تمایل دارید فاکتور این سفارش به نام شخص حقوقی، ثبت شود، کافی است
                            <a>
                                اطلاعات حقوقی خود را تکمیل/ ویرایش کنید.
                            </a>
                        </td>
                    </tr>
                    </tbody>

                </table>

                <div class="send-factor">

                    <p>
                        <i></i>
                        آیا مایل هستید به همراه این سفارش فاکتور ارسال شود؟
                    </p>

                    <div class="sort">

                        <ul>
                            @php
                                $factorOptions = ['خیر', 'بله'];
                            @endphp
                            @foreach($factorOptions as $key=>$option)
                                <li data-factor="{{ $key }}" onclick="factorSend(this);" class="@if($selectedOption == $key) active @endif">
                                    <i></i>
                                    <p>
                                        {{ $option }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                </div>

                <div class="buttons">

                    <a class="gray-btn" style="float: right" href="{{ route('cart') }}">
                        بازگشت به سبد خرید
                    </a>

                    <a class="blue-btn" onclick="setAddressSession();" href="{{ route('cart-review') }}">
                        ثبت اطلاعات و ادامه خرید
                    </a>

                </div>

                <div class="next-level">
                    مرحله بعد: بازبینی سفارش
                </div>

            </div>

        </div>

    </div>

    <script>

        /*Set form action from edit address*/
        function setEditRoute(addressID) {
            $('#edit-address').find('form').attr('action', 'addresses/' + addressID);
        }


        /* Select Picker*/
        $('.selectpicker').selectpicker();


        /*Load cities after choosing state & Set State text in hidden input*/
        function loadCity(tag, id, cityID) {
            var i = $(tag).find('option:selected').val();
            var text = $(tag).find('option:selected').text();
            $('#' + id).attr('value', text);
            ldMenu(i, cityID);
            $('.selectpicker').selectpicker('refresh');
        }


        /*Make the Input Numbers Persian*/
        /*Thanks from AI for helping me on this problem*/
        var inputs = ['first-name', 'last-name', 'mobile', 'phone', 'area-code', 'zip-code', 'edit-first-name', 'edit-last-name', 'edit-mobile', 'edit-phone', 'edit-area-code', 'edit-zip-code'];

        for (var i = 0; i < inputs.length; i++) {
            document.getElementById(inputs[i]).addEventListener("input", function () {
                var number = this.value;
                var persianNumber = "";

                for (var j = 0; j < number.length; j++) {
                    var charCode = number.charCodeAt(j);
                    if (charCode >= 48 && charCode <= 57) {
                        persianNumber += String.fromCharCode(charCode + 1728);
                    } else {
                        persianNumber += number.charAt(j);
                    }
                }

                this.value = persianNumber;
            });
        }


        /*Address choose*/
        function chooseAddress(tag) {
            $('.address-table').removeClass('active');
            $(tag).parents('.address-table').addClass('active');
        }


        function factorSend(tag) {
            $('.sort li').removeClass('active');
            $(tag).toggleClass('active');
        }


        function setAddressSession() {

            var addressID = $('.address-table.active').data('id');
            var factor = $('.send-factor').find('li.active').data('factor');

            var url = 'orders/set-address';
            var data = {addressID, factor};

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
            });
        }

    </script>

@endcomponent
