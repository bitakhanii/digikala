<style>

    #products {
        width: 100%;
        float: right;
        margin-top: 15px;
    }

    #products ul {
        float: right;
        width: 100%;
    }

    #products ul li {
        width: 190px;
        height: 320px;
        border: 1px solid #d6d5d9;
        float: right;
        margin: 0 0 10px 10px;
        padding: 8px;
        position: relative;
    }

    #products ul li:hover {
        box-shadow: 0 0 5px #B4B4B4;
        -webkit-box-shadow: 0 0 5px #B4B4B4;
    }

    #products li a {
        width: 100%;
        height: 100%;
        display: block;
        cursor: pointer;
    }

    #products .image {
        text-align: center;
    }

    #products .image img {
        width: 150px;
        max-height: 150px;
    }

    #products .colors {
        text-align: center;
        margin-top: 10px;
    }

    #products .colors span {
        width: 10px;
        height: 10px;
        display: inline-block;
        border: 1px solid #e5e4e8;
    }

    #products .rating {
        float: left;
        width: 100%;
        margin: 7px 0 10px 0;
        position: relative;
    }

    #products .rating .number {
        font-size: 8pt;
        color: #515152;
        line-height: 12px;
        margin: 0;
        position: absolute;
        top: 0;
        left: 62px;
    }

    #products .rating .text {
        display: none;
    }

    #products .rating .gray-stars {
        width: 55px;
        height: 9px;
        display: block;
        background: url(/images/stars.png) repeat 0 -9px;
        float: left;
    }

    #products .rating .red-stars {
        height: 9px;
        display: block;
        background: url(/images/stars.png);
        float: left;
    }

    #products .title {
        float: right;
    }

    #products .title .persian {
        font-size: 8.7pt;
        color: #404041;
        margin: 0;
        line-height: 22px;
    }

    #products .title .english {
        display: none;
    }

    #products .description {
        display: none;
    }

    #products .price {
        float: right;
        position: absolute;
        bottom: 5px;
    }

    #products .price .old {
        font-size: 9pt;
        color: #ff8d75;
        text-decoration: line-through;
        margin: 0;
        font-family: yekan-exbold;
    }

    #products .price .off {
        font-size: 10.2pt;
        color: #009001;
        margin: 5px 0 0 0;
    }

    #products .cart-icon {
        width: 30px;
        height: 30px;
        display: block;
        float: left;
        background: url(/images/add-to-cart-min.png);
        cursor: pointer;
        margin-top: 18px;
        z-index: 2;
        position: absolute;
        bottom: 8px;
        left: 10px;
    }

    #products .details-icon {
        display: none;
    }

    .row-display li {
        width: 842px !important;
        height: unset !important;
        padding: 15px !important;
        margin-bottom: 20px !important;
    }

    .row-display li:hover {
        box-shadow: none !important;
    }

    .row-display a {
        height: unset !important;
    }

    .row-display .right {
        float: right;
        width: 200px;
    }

    .row-display .image {
        margin-top: 10px;
    }

    .row-display .colors {
        margin-top: 15px !important;
    }

    .row-display .rate-text {
        text-align: center;
        margin-bottom: 8px;
    }

    .row-display .rating .text {
        font-size: 8pt;
        color: #515152;
        display: inline-block !important;
        margin: 0;
    }

    .row-display .rating .number {
        display: inline-block;
        font-family: yekan-exbold;
        position: static !important;
    }


    .row-display .rating .gray-stars {
        float: none !important;
        margin: auto;
    }

    .row-display .left {
        float: left;
        width: 620px;
    }

    .row-display .title {
        float: none !important;
    }

    .row-display .title .persian {
        font-size: 9.5pt !important;
    }

    .row-display .title .english {
        font-size: 12pt !important;
        font-family: yekan-exbold;
        display: block !important;
        color: #404041;
        margin: 0 0 5px 0;
    }

    .row-display .description {
        display: block !important;
        margin: 45px 0 20px 0;
    }

    .row-display .description p::before {
        content: " ";
        width: 6px;
        height: 11px;
        display: inline-block;
        background: url(/images/slices.png) -35px -624px;
        margin-left: 12px;
    }

    .row-display .description p {
        font-size: 9.5pt;
        color: #505050;
    }

    .row-display .price {
        bottom: 15px !important;
        position: static !important;
    }

    .row-display .price * {
        font-size: 14pt !important;
    }

    .row-display .cart-icon {
        display: none !important;
    }

    .row-display .details-icon {
        display: block !important;
        width: 125px;
        height: 35px;
        background-color: #85a42d;
        position: absolute;
        bottom: 15px;
        left: 15px;
        border-radius: 2px;
        cursor: pointer;
        z-index: 2;
    }

    .row-display .details-icon .icon {
        width: 14px;
        height: 100%;
        float: right;
        border-left: 1px solid #acacac;
    }

    .row-display .details-icon .icon i {
        width: 10px;
        height: 10px;
        display: block;
        background: url(/images/slices.png) -196px -81px;
    }

    .row-display .details-icon .text {
        width: 109px;
        height: 100%;
        float: left;
        border-right: 1px solid #7C7C7C;
        color: #fff;
        text-align: center;
        font-size: 8.2pt;
        line-height: 32px;
    }

</style>

<div id="products">
    <ul>
    </ul>
</div>
