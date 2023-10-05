<style>

    #sidebar {
        width: 18%;
        border-left: 1px solid #e8e8e8;
        float: right;
    }

    #sidebar ul {
        padding: 0;
        margin: 0;
    }

    #sidebar li a {
        font-size: 11pt;
        color: #333333;
        display: block;
        cursor: pointer;
        padding: 15px 30px 15px 20px;
        border-bottom: 2px dashed #e8d4de;
    }

    #sidebar li a.active {
        color: #ce0201 !important;
    }

    #sidebar li:nth-child(even) a {
        background-color: #f8e8ec;
    }

    #sidebar li:nth-child(odd) a {
        background-color: #f0f2ff;
    }

    #sidebar li:last-child a {
        margin: 0;
        border-bottom: none;
    }

    #main {
        width: 100%;
        background-color: #fff;
        margin: 10px auto;
        box-shadow: 0 2px 3px rgba(0, 0, 0, .08);
        border-radius: 3px;
        overflow: hidden;
    }

    #main::after {
        content: "";
        display: block;
        clear: both;
    }

</style>

<div id="sidebar">

    <ul>
        <?php
/*        $userLevel = Model::userLevel();
        if ($userLevel == 1) {
            */?>
        <li>
            <a href="admindashboard/index" class="">
                داشبورد
            </a>
        </li>
        <?php /*} */?>
        <li>
            <a href="admincategory/index" class="<?php /*if ($activeMenu == 'category') {
                    echo 'active';
                } */?>">
                مدیریت دسته ها
            </a>
        </li>
        <li>
            <a href="adminproduct/index" class="">
                مدیریت محصولات
            </a>
        </li>
        <li>
            <a href="adminorder/index" class="">
                مدیریت سفارشات
            </a>
        </li>
        <li>
            <a href="admincomment/index" class="">
                نظرات و نقدهای کاربران
            </a>
        </li>
        <li>
            <a href="adminslider/index" class="">
                مدیریت اسلایدر
            </a>
        </li>

        <li>
            <a href="adminuser/index" class="">
                مدیریت اعضا
            </a>
        </li>

        <?php
/*        $userLevel = Model::userLevel();
        if ($userLevel == 1) {
            */?>

        <li>
            <a href="adminstat/index" class="">
                آمار و گزارشات
            </a>
        </li>

        <li>
            <a href="adminsetting/index" class="">
                تنظیمات سایت
            </a>
        </li>

        <?php /*} */ ?>

    </ul>

</div>
