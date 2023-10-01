<style>

    #amazing-offer {
        width: 100%;
        height: 70px;
        background: #fff5f5 url(/images/amazing-offer.png) no-repeat 98% center;
        margin-top: 12px;
        position: relative;
        box-shadow: 0 -1px 2px 1px #e5e5e5;
    }

    #amazing-offer .off-box {
        margin: 17px 80% 0 0;
        float: right;
        border-radius: 3px;
        overflow: hidden;
        color: #fff;
    }

    #amazing-offer .off-box .right {
        background-color: #f84c4c;
        float: right;
    }

    #amazing-offer .off-box .number {
        font-size: 17pt;
        margin: 0;
        padding: 0 20px 2px 20px;
        float: right;
        position: relative;
        top: 3px;
    }

    #amazing-offer .off-box .toman {
        font-size: 9pt;
        margin: 0;
        padding: 0 0 2px 15px;
        float: right;
        width: 50px;
        text-align: center;
    }

    #amazing-offer .off-box .left {
        background-color: #ee1111;
        float: left;
        padding: 0 10px 2px 8px
    }

    #amazing-offer .off-box .left p {
        font-size: 12pt;
        text-align: center;
        margin: 0;
        font-family: yekan-exbold;
        line-height: 32px;
    }

</style>

<div id="amazing-offer">

    <div class="off-box">

        @php
            //TODO put timer here
        @endphp

        <div class="right">
            <p class="number">
                {{ abbreviatePrice($product->discount_amount)[0] }}
            </p>

            <p class="toman">
                {{ abbreviatePrice($product->discount_amount)[1] . ' تومان' }}
            </p>
        </div>
        <div class="left">

            <p>
                تخفیف
            </p>

        </div>

    </div>

</div>
