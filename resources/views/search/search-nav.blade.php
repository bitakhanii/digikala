<script src="/bootstrap/bootstrap.min.js"></script>
<link href="/bootstrap/bootstrap.css" rel="stylesheet">
<script src="/bootstrapSelect/bootstrap-select.js"></script>
<link href="/bootstrapSelect/bootstrap-select.css" rel="stylesheet">

<style>

    #search-nav , #sort , #pagination {
        width: 100%;
        float: right;
        position: relative;
        font-size: 8pt;
        color: #595959;
        margin-top: 15px;
    }

    #search-nav * , #sort * {
        font-size: inherit;
        color: inherit;
    }

    #search-nav .search {
        position: relative;
        width: 330px;
        float: right;
    }

    #search-nav .search input {
        width: 100%;
        height: 20px;
        padding-right: 5px;
        color: #949897;
        border: 1px solid #E5E9E8;
        border-radius: 3px;
    }

    #search-nav .search img {
        position: absolute;
        left: 3px;
        top: 2px;
        cursor: pointer;
    }

    #available-show {
        margin: 1px 15px 0 0;
        float: right;
        position: relative;
    }

    #available-show .background {
        background: url(/images/btn-checked.png) 0 0;
        width: 40px;
        height: 21px;
        float: right;
        margin-left: 2px;
    }

    #available-show .icon {
        background: url(/images/yes-no.png) 0 -21px;
        width: 30px;
        height: 21px;
        position: absolute;
        right: 10px;
        cursor: pointer;
    }

    #available-show.active .background {
        background-position: -40px 0 !important;
    }

    #available-show.active .icon {
        background-position: -30px 0 !important;
    }

    #available-show .text {
        float: right;
        line-height: 24px;
    }

    #display-type {
        float: left;
    }

    #display-type p {
        font-family: yekan-exbold;
        float: right;
        margin: 0;
        line-height: 24px;
    }

    #display-type .linear, #display-type .squares {
        float: right;
        background: url(/images/display-type.png);
        width: 24px;
        height: 24px;
        cursor: pointer;
    }

    #display-type .linear {
        background-position: -24px -24px;
        margin-right: 8px;
    }

    .linear.active {
        background-position: -24px 0 !important;
    }

    .squares.active {
        background-position: 0 -24px !important;
    }

    #sort p {
        font-family: yekan-exbold;
        margin: 0 0 0 8px;
        float: right;
        line-height: 24px;
    }

    #sort p:nth-child(4) {
        margin: 0 10px 0 8px;
    }

    #sort select {
        font-family: yekan;
        float: right;
        margin-left: 3px;
    }

    #sort .bootstrap-select {
        float: right;
        font-size: 7.5pt;
        margin-left: 3px;
        width: 115px;
    }

    #sort .bootstrap-select:nth-child(5) {
        width: 50px !important;
    }

    #sort .dropdown-menu > li > a:hover {
        background-color: #ff9595;
        color: #fff;
    }

    #sort .btn {
        padding: 2px 25px 3px 10px;
    }

    #pagination ul {
        float: left;
    }

    #pagination span, #pagination li {
        border-radius: 3px;
        font-size: 7.5pt;
        border: 1px solid #BABABA;
        float: left;
        background: -moz-linear-gradient(top, #fff, #edecf1);
        box-shadow: 0 2px 1px #dedde1;
        -webkit-box-shadow: 0 2px 1px #dedde1;
        cursor: pointer;
        padding: 4px 10px;
    }

    #pagination li.active , #pagination span.active {
        color: #fff;
        border: 1px solid #535353;
        background: #7f7f7f;
        box-shadow: 0 0 3px 2px #535353 inset;
        -webkit-box-shadow: 0 0 3px 2px #535353 inset;
    }

    .pagination-list {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 250px;
        margin: 0 auto;
        direction: ltr;
    }

    .pagination-item {
        margin: 0 5px;
    }

</style>

<div id="sort">

    <p>
        مرتب سازی بر اساس
    </p>

    <select class="selectpicker" name="filter" onchange="doSearch();">
        <option value="views">پربازدید ترین</option>
        <option value="id">جدید ترین</option>
        <option value="discount">پر تخفیف ترین‌ها</option>
        <option value="sold">پرفروش ترین</option>
        <option value="price">قیمت</option>
    </select>

    <select class="selectpicker" name="order-by" onchange="doSearch();">
        <option value="desc">نزولی</option>
        <option value="asc">صعودی</option>
    </select>

    <p>
        تعداد نمایش
    </p>

    <select class="selectpicker" name="per-page" onchange="doSearch();">
        <option value="3">3</option>
        <option value="5">5</option>
        <option value="8">8</option>
    </select>

    <div id="available-show" onclick="availableShow(this);">
        <span class="background"></span>
        <span class="icon"></span>

        <span class="text">
                    فقط نمایش کالاهای موجود
        </span>
    </div>

    <div id="display-type">

        <p>
            حالت نمایش
        </p>

        <span class="linear" onclick="linearDisplay(this);"></span>
        <span class="squares active" onclick="squareDisplay(this);"></span>

    </div>

</div>

<div id="pagination">

    <span class="prev-page" onclick="doSearch(currentPage - 1)">صفحه قبل</span>

    <ul class="pagination-list">
        <li>y</li>
    </ul>

    <span class="next-page" onclick="doSearch(currentPage + 1)">صفحه بعد</span>

</div>

<script>

    // Available Show

    function availableShow(tag) {

        var thisTag = $(tag);

        thisTag.toggleClass('active');

        if (thisTag.hasClass('active')) {

            $('.icon', thisTag).animate({'right': '-2px'}, 200);
        } else {

            $('.icon', thisTag).animate({'right': '10px'}, 200);
        }
        doSearch();
    }

    function pagination(page) {

        $('#pagination').find('li').removeClass('active');

        doSearch(page);
    }

</script>
