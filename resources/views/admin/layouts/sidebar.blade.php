<style>

    #sidebar {
        width: 16%;
        border-left: 1px solid #e8e8e8;
        float: right;
    }

    #sidebar ul {
        padding: 10px;
        margin: 0;
        background-color: #343a40;
    }

    #sidebar li a {
        display: block;
        cursor: pointer;
        padding: 0 30px 10px 20px;
        font-size: 10.5pt;
        color: #fff;
        margin-bottom: 10px;
    }

    #sidebar ul i {
        width: 24px;
        height: 24px;
        display: inline-block;
        position: relative;
        top: 10px;
        margin-left: 5px;
    }

    #sidebar ul p {
        margin: 0;
        display: inline-block;
    }

    #sidebar li:last-child {
        margin: 0;
        border-bottom: none;
    }

    #sidebar li.active a {
        border-radius: 3px;
        background-color: #c80083;
    }

</style>

<div id="sidebar">

    <ul>
        <?php
/*        $userLevel = Model::userLevel();
        if ($userLevel == 1) {
            */?>
        <li class="{{ makeActive('index') }}">
            <a href="{{ route('admin.index') }}">
                <i style="background: url('/images/dashboard.png')"></i>
                <p>داشبورد</p>
            </a>
        </li>
        <?php /*} */?>
        <li>
            <a href="">
                <i style="background: url('/images/users.png')"></i>
                <p>اعضا</p>
            </a>
        </li>
        <li>
            <a href="">
                <i style="background: url('/images/products.png')"></i>
                <p>محصولات</p>
            </a>
        </li>
        <li>
            <a href="">
                <i style="background: url('/images/orders.png')"></i>
                <p>سفارشات</p>
            </a>
        </li>
        <li>
            <a href="">
                <i style="background: url('/images/comments.png')"></i>
                <p>نظرات و نقدها</p>
            </a>
        </li>
        <li>
            <a href="">
                <i style="background: url('/images/categories.png')"></i>
                <p>دسته ‌بندی‌ها</p>
            </a>
        </li>

        <?php
/*        $userLevel = Model::userLevel();
        if ($userLevel == 1) {
            */?>

        <li>
            <a href="">
                <i style="background: url('/images/statictis.png')"></i>
                <p>آمار و گزارشات</p>
            </a>
        </li>

        <li>
            <a href="">
                <i style="background: url('/images/settings.png')"></i>
                <p>تنظیمات سایت</p>
            </a>
        </li>

        <?php /*} */ ?>

    </ul>
</div>
