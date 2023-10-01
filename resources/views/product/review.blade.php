<style>

    #review {
        width: 1173px;
        background-color: #fff;
        float: right;
        padding: 40px 12px 60px 15px;
    }

    #review > p {
        margin: 0 0 120px 0;
        font-size: 12pt;
        color: #393939;
    }

    #review > p i {
        width: 5px;
        height: 8px;
        display: inline-block;
        background: url(/images/slices.png) -37px -652px;
        margin-left: 12px;
    }

    #review .titles {
        width: 98.5%;
        float: left;
        border-right: 3px solid #F0F1F2;
        height: auto;
        padding: 0;
        margin: 0;
    }

    #review .item {
        width: 97%;
        float: left;
        margin-bottom: 40px;
    }

    #review .item:last-child {
        margin-bottom: -5px;
    }

    #review .item .name {
        position: relative;
        width: 100%;
        float: right;
    }

    #review .item .name i.active {
        background-position: -210px -608px;
    }

    #review .item .name i {
        width: 26px;
        height: 52px;
        display: inline-block;
        background: url(/images/slices.png) -262px -608px;
        position: absolute;
        top: -12px;
        right: -50px;
        cursor: pointer;
    }

    #review .item:first-child .name i {
        background-position: -157px -618px;
    }

    #review .item:first-child .name i.active {
        background-position: -102px -618px;
    }

    #review .item:last-child .name i {
        background-position: -316px -618px;
    }

    #review .item:last-child .name i.active {
        background-position: -210px -608px;
    }

    #review .item .name h4 {
        margin: 0;
        float: right;
        font-size: 11pt;
        color: #404040;
        font-weight: normal;
        position: relative;
        background-color: #fff;
        z-index: 1;
        padding-left: 10px;
    }

    #review .item .name .horizental-line {
        width: 100%;
        height: 1px;
        float: left;
        background-color: #eaeaea;
        margin-top: 17px;
        position: absolute;
        top: 0;
    }

    #review .description {
        float: right;
        padding: 60px 80px 30px 80px;
        display: none;
        text-align: center;
    }

    #review .description .title {
        margin: 10px 0 40px 0;
        font-size: 12pt;
        color: #494949;
    }

    #review .description img {
        border-radius: 3px;
        width: 750px;
        height: 351px;
    }

    #review .description p {
        font-size: 10pt;
        color: #535353;
        line-height: 40px;
        margin: 30px 0 0 0;
        text-align: justify;
    }

</style>

<p>
    <i></i>
    نقد و بررسی متخصصین دیجی کالا
</p>

<ul class="titles">
    @if($reviews)
        @foreach($reviews as $review)
            <li class="item">

                <div class="name">
                    <i style="top: -2px;"></i>
                    <h4>{{ $review->title }}</h4>
                    <div class="horizental-line"></div>
                </div>

                <div class="description">
                    <p>{{ $review->review }}</p>
                </div>

            </li>
        @endforeach
    @endif

</ul>

<script>

    /*Review Tab*/

    $('#review').find('.name i').click(function () {

        $(this).parents('.item').find('.description').slideToggle(400);
        $(this).toggleClass('active');
    });

</script>
