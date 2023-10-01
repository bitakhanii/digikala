<style>

    #my-digibon .coupon-code {
        padding: 30px 15px;
        background-color: #eee;
        border: 1px dotted #4A4A4A;
        border-radius: 3px;
    }

    #my-digibon .coupon-code i {
        width: 16px;
        height: 16px;
        float: right;
        background: url(/images/coupon.png);
        margin: 5px 3px 0 0;
        transform: rotate(-45deg);
    }

    .coupon-code p {
        margin: 0 13px 0 20px;
        color: #575757;
        float: right;
    }

    .coupon-code input {
        width: 350px;
        height: 26px;
        border: 1px solid #d2d2d2;
        border-radius: 3px;
        float: right;
    }

    .coupon-code img {
        margin-right: 8px;
        cursor: pointer;
    }

    #my-digibon .discount-code {
        text-align: left;
        outline: none;
    }

    #my-digibon .main-table {
        width: 100%;
        margin-top: 18px;
    }

    #my-digibon .head {
        font-size: 11pt;
        color: #fff;
        background-color: #3c3c3c;
    }

    #my-digibon .head td {
        text-align: center;
        padding: 4px 18px 8px 18px;
    }

    #my-digibon .value {
        font-size: 8.5pt;
        color: #3c3c3c;
        background-color: #fff;
    }

    #my-digibon .value td {
        text-align: center;
        padding: 7px 15px 9px 15px;
        border-left: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }

    #my-digibon .value td:last-child {
        background-color: #ff7700;
        color: #fff;
    }

    #my-digibon .value td:last-child {
        border-left: none;
    }

</style>

<section id="my-digibon">

    <div class="coupon-code">

        <i></i>

        <p>
            کد دریافت دیجی بن:
        </p>

        <input class="discount-code" name="code">

        <img src="/images/save-voucher.gif" onclick="updateDigibon();">

    </div>

    <table class="main-table" cellspacing="0">

        <tbody>
        <tr class="head">
            <td>ردیف</td>
            <td>کد</td>
            <td>سفارش</td>
            <td>تاریخ ثبت</td>
            <td>تاریخ انقضا</td>
            <td>اعتبار اولیه</td>
            <td>اعتبار مصرفی</td>
            <td>مانده</td>
            <td>وضعیت</td>
        </tr>

        @php
            $i = 1;
        @endphp
        @foreach($digibons as $digibon)
            @php
                $credit = $digibon->initial_credit - $digibon->used;
            @endphp
            <tr class="value">
                <td>{{ engToPersian($i) }}</td>
                <td>{{ $digibon->code }}</td>
                <td>DKC-3227012</td>
                <td>{{ engToPersian(jdate($digibon->created_at)->format('Y/m/d')) }}</td>
                <td>{{ engToPersian(jdate($digibon->expired_at)->format('Y/m/d')) }}</td>
                <td>{{ engToPersian($digibon->initial_credit) }}</td>
                <td>{{ engToPersian($digibon->used) }}</td>
                <td>{{ engToPersian($credit) }}</td>
                <td>
                    {{ engToPersian(digibonStatus($digibon->id)) }}
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach

        </tbody>

    </table>

</section>

<script>

    function updateDigibon() {

        var code = $('.discount-code').val();

        var url = '/profile/update-digibon';
        var data = {'code': code};

        $.post(url, data, function (msg) {
            window.location = '/profile?activeTab=digibon';
        });
    }

</script>
