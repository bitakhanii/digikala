@component('layouts.content')

    <style>

        #main {
            margin: 10px auto;
            width: 1130px;
            background-color: #fff;
            padding: 18px 35px;
            box-shadow: 0 2px 7px rgba(0, 0, 0, .04);
            border-radius: 5px;
            overflow: hidden;
        }

        #main::after {
            content: '';
            clear: both;
            display: block;
        }

        #tab {
            width: 100%;
            background: -moz-linear-gradient(top, #f4f4f4, #f1f1f2);
            border: 1px solid #c2c2c2;
            border-top: 4px solid #484848;
            float: right;
            box-shadow: 0 35px 55px 42px #fff;
            z-index: 5;
            position: relative;
        }

        #tab ul {
            float: right;
            width: 100%;
        }

        #tab li {
            width: 105px;
            height: 34px;
            line-height: 32px;
            float: right;
            color: #3C3C3C;
            font-size: 9pt;
            border-left: 1px solid #c2c2c2;
            cursor: pointer;
            text-align: center;
            padding: 0 8px;
        }

        #tab li:last-child {
            border-left: none;
        }

        #tab li.active {
            background-color: #6C6C6C;
            color: #fff;
        }

        #tab-window {
            width: 100%;
            float: right;
            background: -moz-linear-gradient(top, #fff 55%, #efeef3);
            border-right: 1px solid #C3C3C3;
            border-left: 1px solid #C3C3C3;
            border-bottom: 1px solid #C3C3C3;
            box-shadow: 0 24px 15px -31px #252525;
        }

        #tab-window section {
            display: none;
            width: 1090px;
            padding: 20px;
            float: right;
        }

        #tab-window > section > * {
            z-index: 20;
            position: relative;
        }

        .no-item-table {
            width: 100%;
            margin-bottom: 5px;
        }

        .no-item-table .head {
            background-color: #3c3c3c;
            color: #fff;
        }

        .no-item-table td {
            padding: 15px 0;
        }

        .no-item-table .head td {
            padding: 8px 15px 14px 10px;
        }

        .no-item-table .head td:last-child {
            text-align: center;
        }

        .no-item-table .value {
            background-color: #f3f3f3;
            font-size: 8.5pt;
            color: #393939;
        }

        .no-item-table .value td {
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .table-icon {
            width: 29px;
            height: 28px;
            display: block;
            margin: auto;
            background: url(/images/order-details-open.png);
            cursor: pointer;
        }

        .table-icon.active {
            background: url(/images/order-details-close.png);
        }

    </style>

    <div id="main">
        @include('profile.info-boxes' , $user)
        <div id="tab">

            <ul>
                <li>پیغام های من</li>
                <li id="orders">سفارشات من</li>
                <li id="favorites">لیست مورد علاقه</li>
                <li>نقدهای من</li>
                <li>نظرات من</li>
                <li id="digibon">دیجی بن های من</li>
                <li>کارت های هدیه من</li>
                <li>اطلاع رسانی ها</li>
            </ul>

        </div>

        <div id="tab-window">

            @include('profile.my-messages')
            @include('profile.my-orders')
            @include('profile.favorite-list')
            @include('profile.my-reviews')
            @include('profile.my-comments')
            @include('profile.my-digibons')
            @include('profile.my-gift-cards')
            @include('profile.notifications')

        </div>

    </div>

    <script>

        /*Tab*/

        var tabItems = $('#tab').find('li');
        var tabWindows = $('#tab-window').find('section');

        tabItems.click(function () {

            tabItems.removeClass('active');
            $(this).addClass('active');

            var index = $(this).index();
            tabWindows.fadeOut(0);
            tabWindows.eq(index).fadeIn(0);
        });

        $('#{{ $activeTab }}').trigger('click');

    </script>
@endcomponent
