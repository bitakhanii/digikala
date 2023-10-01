@component('layouts.content')

    <style>

        #main {
            width: 1200px;
            margin: 10px auto;
        }

        #main::after {
            content: '';
            display: block;
            clear: both;
        }

        #shopping-cart, #empty-cart {
            padding: 30px 15px;
            background-color: #fff;
            box-shadow: 0 2px 2px rgba(0, 0, 0, .04);
            margin-top: 12px;
            border-radius: 4px;
            float: right;
            width: 1170px;
        }

        #shopping-cart .head > p {
            margin: 15px 0 25px 0;
            font-size: 12pt;
            color: #393939;
            float: right;
        }

        #shopping-cart .head > p i {
            width: 5px;
            height: 8px;
            display: inline-block;
            background: url(/images/slices.png) -37px -652px;
            margin-left: 12px;
        }

        .green-btn img {
            width: 10px;
            height: 10px;
            display: inline-block;
            margin: 0 2px -2px 0;
        }

        #product {
            width: 100%;
        }

        #product thead tr {
            font-size: 11pt;
            color: #6C6C6C;
            background-color: #f7f9fa;
        }

        #product thead td {
            text-align: center;
            padding: 10px;
            border-top: 1px solid #f2f2f2;
            border-bottom: 1px solid #f2f2f2;
            border-left: 1px solid #f2f2f2;
        }

        #product thead td:first-child {
            border-right: 1px solid #f2f2f2;
        }

        #product thead td:nth-child(4) {
            border-left: 0;
        }

        #product tbody tr {
            font-size: 11pt;
            color: #575757;
            background-color: #fff;
        }

        #product tbody td {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #f2f2f2;
            border-left: 1px solid #f2f2f2;
        }

        #product tbody td:first-child {
            border-right: 1px solid #f2f2f2;
        }

        #product tbody td:nth-child(4) {
            border-left: none;
        }

        #product tbody td:last-child {
            padding: 0;
        }

        #product tbody .image {
            float: right;
            margin-left: 30px;
        }

        #product tbody .image img {
            width: 120px;
        }

        #product tbody .description {
            float: right;
            max-width: 400px;
        }

        #product tbody .persian {
            margin: 0 0 15px 0;
            color: #444444;
            font-size: 10pt;
        }

        #product tbody .english {
            margin: 0 0 15px 0;
            color: #5F5F5F;
            font-size: 10pt;
            text-align: left;
        }

        #product tbody .color p {
            margin: 0;
            font-size: 10pt;
            color: #505050;
            float: right;
        }

        #product tbody .color .line-circle {
            width: 18px;
            height: 18px;
            border-radius: 100%;
            float: right;
            margin: 0 12px 0 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        #product tbody .color .circle {
            width: 16px;
            height: 16px;
            border-radius: 100%;
            float: right;
            margin: 1px;
        }

        #product tbody .color .name {
            font-size: 9.5pt;
            color: #6f6f6f;
        }

        #product tbody .number {
            width: 80px;
            height: 36px;
            border: 1px solid #dadada;
            background-color: #fff;
            border-radius: 3px;
            margin: auto;
            position: relative;
        }

        #product tbody .number i {
            width: 14px;
            height: 10px;
            display: block;
            background: url(/images/slices.png) -942px -663px;
            margin: 12px 8% 0 0;
            cursor: pointer;
            float: right;
        }

        #product tbody .number .add {
            margin: 12px 10% 0 0;
            background: url(/images/slices.png) -912px -663px;
        }

        #product tbody .number p {
            font-size: 10pt;
            color: #7A7A7A;
            margin: 0 15px 0 5px;
            float: right;
            line-height: 35px;
            font-family: yekan-exbold;
        }

        #product tbody .price {
            font-size: 12pt;
            color: #858585;
            font-family: yekan-exbold;
            margin-left: 5px;
        }

        #product tbody .toman {
            font-size: 8.6pt;
            color: #888888;
        }

        #product tbody .remove {
            width: 40px;
            height: 100%;
            background-color: #fff2ef;
            cursor: pointer;
        }

        #product tbody .remove i {
            width: 10px;
            height: 10px;
            background: url(/images/slices.png) -814px -510px;
            display: block;
            margin: auto;
        }

        #final-price {
            width: 520px;
            float: left;
            border: 1px solid #31be41;
            margin: 25px 0 30px 0;
            height: 110px;
        }

        #final-price .total {
            height: 49%;
            border-bottom: 1px solid #31be41;
            padding: 0 40px;
        }

        #final-price .payment {
            height: 50%;
            padding: 0 40px;
            background-color: #f2ffef;
        }

        #final-price p {
            font-size: 10pt;
            float: right;
            margin: 15px 0 0 0;
        }

        #final-price .price {
            float: left;
            margin-top: 15px;
        }

        #final-price .toman {
            font-size: 9pt;
            float: left;
            margin: 15px 15px 0 0;
        }

        #final-price .total p {
            color: #767676;
        }

        #final-price .total .price {
            font-size: 12.5pt;
            color: #767676;
        }

        #final-price .total .toman {
            color: #767676;
        }

        #final-price .payment p {
            color: #0d9a1d;
        }

        #final-price .payment .price {
            font-size: 15.5pt;
            color: #0d9a1d;
        }

        #final-price .payment .toman {
            color: #0d9a1d;
        }

        #shopping-cart .buttons {
            float: right;
            margin-bottom: 10px;
            width: 100%;
        }

        #shopping-cart .buttons .gray-btn {
            float: right;
        }

        #shopping-cart .buttons p {
            margin: 0 0 0 50px;
            float: left;
            width: 310px;
            color: #555555;
            font-size: 10pt;
        }

        #shopping-cart .arrow {
            top: 3px;
            position: relative;
        }

        #empty-cart div {
            width: 70%;
            border: 1px solid #fd1e41;
            border-radius: 20px;
            margin: auto;
            text-align: center;
        }

        #empty-cart p {
            color: #fd1e41;
            text-align: center;
        }

    </style>

    <div id="main">

        @if(\Modules\Cart\Facade\Cart::count())
            <div id="shopping-cart">

                <div class="head">

                    <p>
                        <i></i>
                        سبد خرید شما در دیجی کالا
                    </p>

                    <a class="blue-btn" href="{{ route('cart-login') }}">
                        انتخاب شیوه ارسال کالاها
                        <img class="arrow" src="/images/back.png">
                    </a>

                </div>

                <table id="product" cellspacing="0">

                    <thead>
                    <tr>
                        <td>شرح محصول</td>
                        <td>تعداد</td>
                        <td>قیمت واحد</td>
                        <td>قیمت کل (با تخفیف)</td>
                        <td></td>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach(\Cart::all() as $cart)

                        @php
                            $product = \App\Models\Product::query()->where('id', $cart['product_id'])->first();
                            $color = \App\Models\Color::query()->where('id', $cart['color_id'])->first();
                            $price = $product->price;
                            $discount = $product->discount;
                            $discountPrice = $product->final_price;
                            $inventory = $product->inventory;
                        @endphp

                        <tr>
                            <td>
                                <div class="image">
                                    <a href="{{ route('product', $product->id) }}">
                                        <img
                                            src="/images/products/{{ $product->id }}/product-{{ $product->id }}_220.jpg">
                                    </a>
                                </div>
                                <div class="description">

                                    <p class="persian">{{ $product->title }}</p>

                                    <p class="english">{{ $product->en_title }}</p>

                                    @if($color)
                                        <div class="color">

                                            <p>
                                                رنگ:
                                            </p>

                                            <span class="line-circle">
                                            <span class="circle" style="background-color: #{{ $color->hex }}"></span>
                                        </span>
                                            <span class="name">{{ $color->name }}</span>

                                        </div>
                                    @endif

                                </div>
                            </td>

                            <td>

                                <div class="number">
                                    <i class="add"
                                       onclick="updateNumber(this, {{ $inventory }}, {{ $cart['product_id'] }}, {{ $cart['color_id'] }})"></i>
                                    <p>{{ engToPersian($cart['number']) }}</p>
                                    <i class="reduce"
                                       onclick="updateNumber(this, {{ $inventory }}, {{ $cart['product_id'] }}, {{ $cart['color_id'] }})"></i>
                                </div>

                            </td>

                            <td>
                            <span
                                class="price">{{ number_format($product->price) }}</span>
                                <span class="toman">تومان</span>
                            </td>

                            <td>
                            <span
                                class="price">{{ number_format($discountPrice * $cart['number']) }}</span>
                                <span class="toman">تومان</span>
                            </td>

                            <td class="remove" onclick="deleteProduct('{{ $cart['id'] }}');">
                                <i></i>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>

                <div id="final-price">

                    <div class="total">

                        <p>
                            جمع کل خرید شما:
                        </p>

                        <span class="toman">تومان</span>

                        <span class="price">{{ number_format(\Cart::all()->sum(function ($item) {
    return $item['product']['price'] * $item['number'];
})) }}</span>

                    </div>

                    <div class="payment">

                        <p>
                            مبلغ قابل پرداخت:
                        </p>

                        <span class="toman">تومان</span>

                        <span class="price">{{ number_format(\Cart::all()->sum(function ($item) {
   return ($item['product']['price'] - ($item['product']['price'] * $item['product']['discount'] / 100))  * $item['number'];
})) }}</span>

                    </div>

                </div>

                <div class="buttons">

                    <a class="blue-btn" href="{{ route('cart-login') }}">
                        انتخاب شیوه ارسال کالاها
                        <img class="arrow" src="/images/back.png">
                    </a>

                    <p>
                        بر اساس مکان تحویل سفارش، امکان افزوده شدن هزینه ارسال به این مبلغ وجود دارد.
                    </p>

                </div>

            </div>
        @else
            <div id="empty-cart">
                <div>
                    <img src="images/empty-cart.png">
                    <p>سبد خرید شما خالیست!</p>
                </div>
            </div>
        @endif

    </div>

    <script>

        /*Update Number of Product*/
        function updateNumber(tag, inventory, productID, colorID) {

            if (typeof (colorID) === "undefined") {
                colorID = 0;
            }

            var numContainer = $(tag).parents('.number').find('p');
            var number = persianJs(numContainer.text()).persianNumber();

            if ($(tag).attr('class') === 'add') {
                if (number <= inventory - 1) {
                    numContainer.text(persianJs(parseInt(number) + 1).englishNumber());
                }
            } else if ($(tag).attr('class') === 'reduce') {
                if (number >= 2) {
                    numContainer.text(persianJs(parseInt(number) - 1).englishNumber());
                }
            }

            var newNumber = persianJs(numContainer.text()).persianNumber();
            var url = 'cart/updateNumber/' + productID + '/' + colorID + '/' + newNumber;
            var data = {};
            $.post(url, data, function (msg) {

                createBasketList(msg[0], msg[1], msg[2]);

            }, 'json');
        }


        /*Delete Product from Basket*/
        function deleteProduct(productID) {
            var url = 'cart/deleteProduct/' + productID;
            var data = {};
            $.post(url, data, function (msg) {

                if (msg[0].length !== 0) {
                    createBasketList(msg[0], msg[1], msg[2]);
                } else {
                    emptyCart();
                }

            }, 'json');
        }


        /*Show icon of empty cart*/
        function emptyCart() {
            var emptyCartTag = '<div id="empty-cart"><div><img src="images/empty-cart.png"><p>سبد خرید شما خالیست!</p></div></div>';

            $('#shopping-cart').fadeOut(0);
            $('#main').append(emptyCartTag);
        }


        /*Basket List After Use Ajax*/
        function createBasketList(products, allProductsPrice, allProductsDiscount) {

            $('table tbody tr').remove();

            $.each(products, function (index, value) {

                var product = value['product'];
                if (value['color_id'] != 0) {
                    var color = value['color'];
                    var colorHex = color['hex'];
                    var colorName = color['name'];
                    var colorID = value['color_id'];
                }

                var id = value['product_id'];
                var title = product['title'];
                var engTitle = product['en_title'];
                var number = value['number'];
                var price = product['price'];
                var totalPrice = (price * number) - ((price * product['discount'] / 100) * number);
                var basketID = value['id'];
                var inventory = product['inventory'];

                if (colorID != null) {
                    var colorBox = '<div class="color"><p>رنگ: </p><span class="line-circle"><span class="circle" style="background-color: ' + colorHex + ' "></span></span><span class="name">' + colorName + '</span></div>';
                } else {
                    colorBox = '';
                }

                if (engTitle != null) {
                    var enTitle = engTitle;
                } else {
                    enTitle = '';
                }

                var productInBasket = '<tr><td><div class="image"><img src="images/products/' + id + '/product-' + id + '_220.jpg"></div><div class="description"><p class="persian">' + title + '</p><p class="english">' + enTitle + '</p>' + colorBox + '</div></td><td><div class="number"><i class="add" onclick="updateNumber(this, ' + inventory + ', ' + id + ', ' + colorID + ')"></i><p>' + number + '</p><i class="reduce" onclick="updateNumber(this, ' + inventory + ', ' + id + ', ' + colorID + ')"></i></div></td><td><span class="price">' + itpro(price) + '</span><span class="toman">تومان</span></td><td><span class="price">' + itpro(totalPrice) + '</span><span class="toman">تومان</span></td><td class="remove" onclick="deleteProduct(\'' + basketID.toString() + '\');"><i></i></td></tr>';

                $('table tbody').append(productInBasket);
            });

            $('.total .price').text(itpro(allProductsPrice));
            $('.payment .price').text(itpro(allProductsDiscount));
        }

    </script>

@endcomponent
