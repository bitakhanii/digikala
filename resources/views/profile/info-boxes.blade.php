<style>

    .information-box {
        width: 100%;
        border-right: 1px solid #C3C3C3;
        border-left: 1px solid #C3C3C3;
        border-bottom: 1px solid #C3C3C3;
        margin-bottom: 25px;
        box-shadow: 0 24px 15px -26px #252525;
    }

    .information-box:nth-child(2) {
        box-shadow: 0 24px 15px -26px #252525;
    }

    .information-box .header {
        height: 42px;
        box-shadow: 0 85px 88px 82px #fff;
    }

    .information-box .header span {
        width: 4.3%;
        height: 100%;
        float: right;
        border-radius: 3px;
        position: relative;
        background-color: #439ebd;
    }

    .information-box:nth-child(2) .header span {
        background-color: #c1402c;
    }

    .information-box .header span::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 10px 8px 0 8px;
        border-color: #439ebd transparent transparent transparent;
        position: absolute;
        bottom: -9px;
        right: 16px;
    }

    .information-box:nth-child(2) .header span::after {
        border-color: #c1402c transparent transparent transparent;
    }

    .information-box .header i {
        background: url(/images/user.png) no-repeat 0 11px;
        width: 37px;
        height: 32px;
        display: block;
    }

    .information-box:nth-child(2) .header i {
        background: url(/images/bar-chart.png) no-repeat 4px 2px;
        width: 22px;
        height: 20px;
        margin: 11px 14px 0 0;
        border-right: 1px solid #fff;
        border-bottom: 1px solid #fff;
    }

    .information-box .header div {
        width: 93.2%;
        height: 100%;
        float: left;
        background-color: #79777D;
        border-radius: 3px;
        color: #fff;
        padding: 0 12px;
        line-height: 40px;
        font-size: 11pt;
    }

    .information-box .content {
        width: 990px;
        background: -moz-linear-gradient(top, #fff, #f4f3f8);
        padding: 30px 70px 0 70px;
    }

    .information-box .content > div {
        width: 100%;
        color: #595959;
        float: right;
        margin-bottom: 15px;
        font-size: 10.5pt;
    }

    .information-box .content > div p {
        margin: 0;
        float: right;
    }

    .information-box .content .horizental-line {
        float: left;
        border-bottom: 1px dotted #000;
        width: 86%;
        margin-top: 14px;
    }

    .user-info {
        font-size: 8.5pt;
        width: 100%;
        padding: 0 45px;

    }

    .user-info td {
        padding-bottom: 15px;
    }

    .user-info:nth-child(1) td {
        text-align: center;
    }

    .user-info .property {
        color: #1c6093;
        width: 105px;
        text-align: left;
        display: inline-block;
    }

    .user-info:nth-child(1) .property {
        width: auto;
    }

    .user-info .value {
        color: #414141;
        margin-right: 10px;
    }

    .information-box:nth-child(2) .user-info .value {
        margin-right: 0;
        font-family: yekan-exbold;
        font-size: 8.5pt;
    }

    .user-info td .edit, .user-info td .password {
        width: 115px;
        height: 30px;
        float: left;
        margin: 20px 15px 0 0;
        cursor: pointer;
    }

    .red-btn {
        float: right;
    }

</style>

<div class="information-box">

    <div class="header">

            <span>
                <i></i>
            </span>

        <div>
            اطلاعات کاربر
        </div>

    </div>

    <div class="content">

        <div>
            <p>
                اطلاعات مشتری حقیقی
            </p>
            <div class="horizental-line"></div>
        </div>

        <table class="user-info">

            <tbody>

            <tr>
                <td>
                    @php
                        $name = explode('-', $user->name);
                        $fName = $name[0];
                        if (isset($name[1])) {
                          $lName = $name[1];
                        }
                    @endphp
                    <span class="property">
                            نام و نام خانوادگی:
                        </span>
                    <span class="value">{{ $fName.' '.@$lName }}</span>
                </td>
                <td>
                        <span class="property">
                            آدرس الکترونیک:
                        </span>
                    <span class="value">{{ $user->email }}</span>
                </td>
                <td>
                        <span class="property">
                            کدملی:
                        </span>
                    <span class="value">
                        {{ engToPersian($user->national_code) }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                        <span class="property">
                            شماره تلفن ثابت:
                        </span>
                    <span class="value">
                        {{ engToPersian($user->area_code.'-'.$user->phone) }}
                    </span>
                </td>
                <td>
                        <span class="property">
                            شماره تلفن همراه:
                        </span>
                    <span class="value">
                        {{ engToPersian($user->mobile) }}
                    </span>
                </td>
                <td>
                        <span class="property">
                            تاریخ تولد:
                        </span>
                    <span class="value">
                        @if($user->dob)
                            {{ engToPersian(jdate($user->dob)->format('Y/m/d')) }}
                        @endif
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                        <span class="property">
                            جنسیت:
                        </span>
                    <span class="value">
                        @if($user->sex == 'female')
                            زن
                        @elseif($user->sex == 'male')
                            مرد
                        @endif
                    </span>
                </td>
                <td>
                        <span class="property">
                            دریافت خبرنامه:
                        </span>
                    <span class="value">
                        @if($user->newsletter == 1)
                            بله
                        @else
                            خیر
                        @endif
                    </span>
                </td>
                <td>
                        <span class="property">
                            شماره کارت:
                        </span>
                    <span class="value">
                        {{ engToPersian($user->credit_card) }}
                    </span>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                        <span class="property">
                            محل سکونت:
                        </span>
                    <span class="value">{{ $user->address }}</span>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <a href="{{ route('profile.change-password' , $user) }}"
                       style="background: url(/images/change-password.png);" class="password"></a>
                    <a href="{{ route('profile.edit' , $user) }}" style="background: url(/images/edit.png)"
                       class="edit"></a>
                    @php
                        // TODO make delete account button
                    @endphp
                    {{--<form id="delete-account" action="{{ route('profile.destroy') }}" method="POST">
                        @csrf
                        @method('delete')
                        <span onclick="$('#delete-account').submit();" class="red-btn">حذف حساب کاربری</span>
                        @include('profile.delete-user-form')
                    </form>--}}
                </td>
            </tr>

            </tbody>

        </table>

    </div>

</div>

<div class="information-box">

    <div class="header">

            <span>
                <i></i>
            </span>

        <div>
            گزارش عملکرد
        </div>

    </div>

    <div class="content">

        <table class="user-info">

            <tbody>

            <tr>
                <td>
                        <span class="property">
                            تعداد کل سفارشات:
                        </span>
                    <span class="value">{{ engToPersian($ordersCount['count']) }}</span>
                </td>
                <td>
                        <span class="property">
                            کل دیجی بن دریافتی:
                        </span>
                    <span class="value">
                            {{ engToPersian(digibonsCount()['count']) }}
                        </span>
                </td>
                <td>
                        <span class="property">
                            تعداد نظرات ارسال شده:
                        </span>
                    <span class="value">
                        {{ engToPersian($commentsCount) }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                        <span class="property">
                            سفارشات پرداخت شده:
                        </span>
                    <span class="value">
                        {{ engToPersian($ordersCount['paid']) }}
                    </span>
                </td>
                <td>
                        <span class="property">
                            کل دیجی بن مصرفی:
                        </span>
                    <span class="value">
                        {{ engToPersian(digibonsCount()['used']) }}
                        </span>
                </td>
                <td>
                           <span class="property">
                               تعداد نقدهای ارسال شده:
                           </span>
                    <span class="value">
                               ۰
                           </span>
                </td>
            </tr>

            <tr>
                <td>
                        <span class="property">
                            سفارشات در حال پردازش:
                        </span>
                    <span class="value">
                        {{ engToPersian($ordersCount['processing']) }}
                    </span>
                </td>
                <td>
                        <span class="property">
                            کل دیجی بن باطل شده:
                        </span>
                    <span class="value">
                        {{ engToPersian(digibonsCount()['expired']) }}
                        </span>
                </td>
                <td>
                        <span class="property">
                            تعداد پیغام های خوانده نشده:
                        </span>
                    <span class="value">
                        {{ engToPersian($unreadMessages) }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                        <span class="property">
                            سفارشات انصراف داده شده:
                        </span>
                    <span class="value">
                        {{ engToPersian($ordersCount['canceled']) }}
                    </span>
                </td>
                <td>
                        <span class="property">
                            دیجی بن مانده قابل مصرف:
                        </span>
                    <span class="value">
                            {{ engToPersian(digibonsCount()['usable']) }}
                        </span>
                </td>
            </tr>

            <tr>
                <td>
                        <span class="property">
                            سفارشات ارسال شده:
                        </span>
                    <span class="value">
                        {{ engToPersian($ordersCount['posted']) }}
                    </span>
                </td>
            </tr>

            </tbody>

        </table>

    </div>

</div>
