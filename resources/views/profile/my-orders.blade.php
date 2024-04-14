<style>

    #orders-table {
        width: 100%;
        border-bottom: 1px solid #ddd;
        margin-bottom: 5px;
    }

    #orders-table .head {
        background-color: #3c3c3c;
        color: #fff;
    }

    #orders-table .head td {
        text-align: center;
        padding: 4px 10px 8px 10px;
        border: none;
    }

    #orders-table .value {
        background-color: #f3f3f3;
        font-size: 8.8pt;
        color: #3c3c3c;
    }

    #orders-table .value td {
        text-align: center;
        padding: 5px 0 10px 0;
        border-left: 1px solid #dddddd;
        border-top: 2px solid #949494;
    }

    #orders-table .value:nth-child(2) td {
        border-top: none;
    }

    #orders-table .value td:first-child {
        font-family: yekan-exbold;
    }

    #orders-table .value td:nth-child(2) {
        color: #366b8c;
        font-family: yekan-exbold;
        font-size: 8pt;
    }

    #orders-table .value td:nth-child(3) {
        padding: 0;
    }

    #orders-table .value td:nth-child(3) span {
        display: block;
        text-align: center;
        margin-top: 7px;
    }

    #orders-table .value td:nth-child(5) {
        color: #000;
        font-size: 9pt;
        padding: 0;
    }

    #orders-table .status-paid {
        background-color: #e7f5df;
    }

    #orders-table .status-processing {
        background-color: #fce5f6;
    }

    #orders-table .status-posted {
        background-color: #f5f2d1;
    }

    #orders-table .status-received {
        background-color: #d5eaff;
    }

    #orders-table .status-canceled {
        background-color: #cc3f4b;
    }

    #orders-table .status-unpaid {
        background-color: #e7e7e7;
    }

    #orders-table .value td:nth-child(6) div {
        width: 98px;
        height: 33px;
        background-color: #c7e5eb;
        border-radius: 3px;
        margin: auto;
        cursor: pointer;
    }

    #orders-table .value td:nth-child(6) img {
        width: 21px;
        height: 21px;
        float: right;
        margin: 5px 8px 0 13px;
    }

    #orders-table .value td a {
        float: right;
        width: 100%;
    }

    #orders-table .value td:nth-child(6) p {
        margin: 8px 0 0 0;
        color: #fff;
        float: right;
        font-size: 9.5pt;
        letter-spacing: 1px;
    }

    #orders-table .value .pay-success {
        padding: 0;
        background-color: #55b94e;
        color: #fff;
        font-size: 10pt;
    }

    #orders-table .value td:last-child {
        border-left: none;
    }

    #orders-table .details {
        display: none;
    }

    #orders-table .orders-sub-table {
        box-shadow: 0 4px 5px #8A8A8A inset;
        padding: 12px 12px 20px 12px;
        background-color: #fff;
    }

    .product {
        width: 100%;
    }

    .product td {
        border-left: 1px solid #eaeaea;
    }

    .product tr td:last-child {
        border-left: none;
    }

    .product-title {
        background-color: #d4d4d4;
        color: #404040;
        font-size: 11pt;
    }

    .product-title td {
        text-align: center;
        padding: 4px 0;
    }

    .product-title td:first-child {
        text-align: right;
        padding: 4px 15px 4px 0;
    }

    .product-value {
        background-color: #fff;
        font-size: 8.5pt;
        color: #404040;
    }

    .product-value td {
        text-align: center;
        padding: 10px 0;
    }

    .product-value td:first-child {
        padding-right: 10px;
    }

    .product-value p {
        color: #197493;
        font-family: yekan-exbold;
        margin: 0 0 5px 0;
    }

    .product-value span {
        display: block;
    }

    .orders-sub-table h4 {
        margin: 0;
        background-color: #d4d4d4;
        color: #404040;
        padding: 3px 15px;
        font-weight: normal;
        font-size: 11pt;
    }

    .order-steps {
        background-color: #fdfdf9;
        padding: 55px 87px 30px 86px;
        float: right;
        width: 891px;
        margin-bottom: 10px;
    }

    .order-steps .dash {
        float: right;
        margin: 13px 20px 0 10px;
    }

    .order-steps .dash:last-child {
        margin-right: -17px;
    }

    .order-steps .dash span {
        width: 12px;
        height: 2px;
        float: right;
        background-color: #2196f3;
        margin-left: 5px;
    }

    .order-steps ul {
        padding: 0;
        margin: 0;
        float: right;
    }

    .order-steps li {
        float: right;
        margin-left: 10px;
    }

    .order-steps li span {
        width: 18px;
        height: 18px;
        float: right;
        border: 4px solid #cfd4d7;
        border-radius: 100%;
    }

    .order-steps li.active span {
        border: 4px solid #2196f3;
        background: #2196f3 url(/images/slices.png) -810px -475px;
    }

    .order-steps li.half-active span {
        border: 3px solid #2196f3;
        background: #dfe7f3;
    }

    .order-steps li div {
        width: 160px;
        height: 2px;
        background-color: #cfd4d7;
        float: right;
        margin: 13px 10px 0 0;
    }

    .order-steps li.active div {
        background-color: #2196f3;
    }

    .order-steps li p {
        font-size: 12pt;
        color: #8A8C94;
        margin: 35px -15px 0 0;
    }

    .orders-sub-table .information {
        width: 100%;
    }

    .orders-sub-table .information tr {
        font-size: 8.5pt;
    }

    .orders-sub-table .information td {
        border-right: 1px solid #e4e4e4;
        border-bottom: 1px solid #e4e4e4;
        width: 33%;
        text-align: center;
        padding: 10px;
    }

    .orders-sub-table .information td:first-child {
        text-align: right;
        border-right: none;
    }

    .orders-sub-table .information tr:last-child td {
        border-bottom: none;
    }

    .orders-sub-table .information .info-property {
        color: #404040;
    }

    .orders-sub-table .information .info-value {
        color: #005776;
        line-height: 23px;
    }

</style>

<section id="my-orders">

    <table id="orders-table" cellspacing="0">

        <tbody>

        <tr class="head">
            <td>ردیف</td>
            <td>کد</td>
            <td>تاریخ</td>
            <td>مبلغ کل</td>
            <td>وضعیت</td>
            <td>عملیات پرداخت</td>
            <td>جزئیات</td>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach($orders as $order)
            <tr class="value">
                <td>{{ engToPersian($i) }}</td>
                <td>DKC-{{ $order->id }}</td>
                <td>
                    <span style="margin: 0">{{ engToPersian(jdate($order->created_at)->format('Y/m/d')) }}</span>
                    <span>{{ engToPersian(jdate($order->created_at)->format('H:i')) }}</span>
                </td>

                <td>{{ engToPersian(number_format($order->amount)) }}</td>

                @if($order->status == 'paid')
                    <td class="status-paid">پرداخت شده</td>
                @elseif($order->status == 'processing')
                    <td class="status-processing">در حال پردازش</td>
                @elseif($order->status == 'posted')
                    <td class="status-posted">ارسال شده</td>
                @elseif($order->status == 'received')
                    <td class="status-received">دریافت شده</td>
                @elseif($order->status == 'canceled')
                    <td class="status-canceled">کنسل شده</td>
                @elseif($order->status == 'unpaid')
                    <td class="status-unpaid">در انتظار پرداخت</td>
                @endif

                @if($order->pay_gateway != 'cash')
                    @if($order->status == 'unpaid')
                        <td>
                            <div>
                                @php
                                    // TODO make this route
                                @endphp
                                <form action="{{ route('profile.payment.order', $order->id) }}" method="post"
                                      id="order-pay">
                                    @csrf
                                    <span onclick="$('#order-pay').submit();">
                                    <img src="/images/wallet.png">
                                    <p>پرداخت</p>
                                </span>
                                </form>
                            </div>
                        </td>
                    @elseif ($order->status == 'canceled')
                        <td class="status-unpaid">-</td>
                    @else
                        <td class="pay-success">
                            پرداخت شده
                        </td>
                    @endif
                @else
                    <td class="pay-success">
                        پرداخت در محل
                    </td>
                @endif
                <td>
                    <i class="table-icon" onclick="myOrdersDetails(this)"></i>
                </td>
            </tr>

            <tr class="details">
                <td colspan="8">
                    <div class="orders-sub-table">

                        <table class="product" cellspacing="0">

                            <tbody>

                            <tr class="product-title">
                                <td>کالا</td>
                                <td>تعداد</td>
                                <td>قیمت واحد</td>
                                <td>قیمت کل</td>
                                <td>تخفیف کل</td>
                                <td>مبلغ کل</td>
                            </tr>
                            @php
                                $products = $order->products;
                            @endphp

                            @foreach($products as $product)
                                @php
                                    $price = $product->pivot->price;
                                    $number = $product->pivot->number;
                                    $discount = $product->pivot->discount;
                                    $discountPrice = ($discount * $price / 100) * $number;
                                    $finalPrice = ($price * $number) - $discountPrice;
                                @endphp
                                <tr class="product-value">
                                    <td>
                                        <p>{{ $product->title }}</p>
                                    </td>
                                    <td>{{ $number }} عدد</td>
                                    <td>{{ number_format($price) }}</td>
                                    <td>{{ number_format($price * $number) }}</td>
                                    <td>{{ number_format($discountPrice) }}</td>
                                    <td>{{ number_format($finalPrice) }}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        <h4>
                            رهگیری سفارش
                        </h4>

                        <div class="order-steps">

                            <div class="dash">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <ul>
                                <li class="steps @if($order->status == 'unpaid' || $order->status == 'canceled') half-active @else active @endif">
                                    <span></span>
                                    <div></div>
                                    <p>
                                        پرداخت
                                    </p>
                                </li>

                                <li class="steps @if($order->status == 'posted' || $order->status == 'received') active @elseif($order->status == 'processing' || $order->status == 'paid') half-active @endif">
                                    <span></span>
                                    <div></div>
                                    <p>
                                        پردازش انبار
                                    </p>
                                </li>

                                <li class="steps @if($order->status == 'posted' || $order->status == 'received') active @elseif($order->status == 'prepared') half-active @endif">
                                    <span></span>
                                    <div></div>
                                    <p>
                                        ارسال شده
                                    </p>
                                </li>

                                <li class="steps @if($order->status == 'received') active @elseif($order->status == 'posted') half-active @endif">
                                    <span></span>
                                    <p>
                                        تحویل شده
                                    </p>
                                </li>
                            </ul>

                            <div class="dash">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                        </div>

                        <table class="information" cellspacing="0">

                            <tbody>

                            <tr>
                                <td>
                                        <span class="info-property">
                                            روش ارسال:
                                        </span>
                                    <span class="info-value">
                                            تحویل اکسپرس دیجی کالا (هزینه ارسال: رایگان (ویژه سفارش های با ارزش بیشتر از سیصد هزار تومان) - سفارش های کمتر از سیصد هزار تومان: ۱۵۰۰۰ تومان ثابت)
                                        </span>
                                </td>

                                <td>
                                        <span class="info-property">
                                            زمان ارسال:
                                        </span>
                                    <span class="info-value">
                                            @if($order->status == 'unpaid')
                                            در انتظار پرداخت
                                        @else
                                            بازه ۱۲ - ۱۵
                                            تاریخ: {{ engToPersian(jdate($order->created_at)->addDays(5)->format('Y/m/d')) }}
                                        @endif
                                        </span>
                                </td>

                                <td>
                                        <span class="info-property">
                                            کد مرسوله:
                                        </span>
                                    <span class="info-value">
                                            نامشخص
                                        </span>
                                </td>
                            </tr>

                            @if($order->address)
                                <tr>
                                    <td>
                                        <span class="info-property">
                                            آدرس تحویل:
                                        </span>
                                        <span class="info-value">{{ engToPersian($order->address->address) }}</span>
                                    </td>

                                    <td>
                                        <span class="info-property">
                                            تحویل گیرنده:
                                        </span>
                                        <span class="info-value">{{ $order->address->name }}</span>
                                    </td>

                                    <td>
                                        <span class="info-property">
                                            شماره تماس:
                                        </span>
                                        <span class="info-value">{{ engToPersian($order->address->mobile) }}
                                            @if($order->address->phone)
                                                - {{ engToPersian($order->address->area_code . $order->address->phone) }}
                                            @endif</span>
                                    </td>
                                </tr>
                            @endif

                            </tbody>

                        </table>

                    </div>
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

    /*My Orders Table*/

    function myOrdersDetails(tag) {

        var myOrdersIcon = $(tag);
        myOrdersIcon.toggleClass('active');

        myOrdersIcon.parents('.value').next().fadeToggle(0);
    }

</script>
