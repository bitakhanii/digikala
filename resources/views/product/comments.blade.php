<style>

    #comments {
        padding: 20px 15px;
        float: right;
        width: 1170px;
        background-color: #fff;
    }

    #score {
        width: 505px;
        float: right;
    }

    #score > p {
        margin: 15px 0 40px 0;
        font-size: 12pt;
        color: #393939;
    }

    #score > p i {
        width: 5px;
        height: 8px;
        display: inline-block;
        background: url(/images/slices.png) -37px -652px;
        margin-left: 12px;
    }

    #score > p span {
        font-size: 9.5pt;
        color: #717171;
        margin: 10px 12px 0 0;
        display: block;
        line-height: 26px;
    }

    #score ul {
        padding: 0;
        margin: 0;
        float: right;
        width: 100%;
    }

    #score ul li {
        width: 100%;
        float: right;
        margin-bottom: 20px;
    }

    #score li p {
        font-size: 9pt;
        color: #464646;
        float: right;
        width: 150px;
        margin: 0;
    }

    #score li .gray {
        width: 65px;
        height: 10px;
        display: block;
        background-color: #cbcbcb;
        float: right;
        margin: 3px 0 0 1px;
    }

    #score li .green {
        height: 100%;
        display: block;
        background-color: #198f11;
        position: relative;
    }

    #score li .green b {
        font-size: 8.5pt;
        color: #616161;
        position: absolute;
        left: -22px;
        top: -2px;
    }

    #score .no-comment {
        text-align: center;
        margin-top: 100px;
    }

    #score .no-comment p {
        font-family: yekan-black;
        text-align: center;
        color: #2196F3;
    }

    #send-comment {
        width: 600px;
        float: left;
        margin-top: 35px;
    }

    #send-comment .star-score {
        width: 100%;
        height: 50px;
        float: right;
    }

    #send-comment .star-score > p {
        font-size: 12pt;
        color: #828282;
        margin: 0 10px 35px 0;
        float: right;
    }

    #send-comment .star-score .stars {
        margin: 3px 25px 0 8px;
        float: right;
    }

    #send-comment .star-score .light {
        width: 14px;
        height: 14px;
        display: block;
        background: url(/images/slices.png) -533px -30px;
        float: left;
        margin-left: 5px;
    }

    #send-comment .star-score .dark {
        width: 15px;
        height: 15px;
        display: block;
        background: url(/images/slices.png) -496px -30px;
        float: left;
    }

    #send-comment .star-score .rate p {
        font-size: 9pt;
        color: #7B7B7B;
        float: right;
        margin: 5px 0 0 0;
    }

    #send-comment > h3 {
        font-size: 12pt;
        color: #676767;
        margin: 0;
        float: right;
        font-weight: normal;
        font-family: yekan-exbold;
    }

    #send-comment > p {
        font-size: 10.5pt;
        color: #6D6D6D;
        margin: 40px 0;
        float: right;
    }

    #user-comments {
        width: 1170px;
        float: right;
        margin-top: 100px;
    }

    #user-comments .sort {
        width: 100%;
        float: right;
    }

    #user-comments .sort > p {
        margin: 0 0 15px 0;
        font-size: 12pt;
        color: #393939;
        float: right;
    }

    #user-comments .sort > p i {
        width: 5px;
        height: 8px;
        display: inline-block;
        background: url(/images/slices.png) -37px -652px;
        margin-left: 12px;
    }

    #user-comments .sort > p span {
        font-size: 9.5pt;
        color: #717171;
        margin-right: 12px;
    }

    #user-comments .sort ul {
        padding: 0;
        margin: 7px 0 0 0;
        float: left;
    }

    #user-comments .sort li {
        float: right;
        margin-left: 15px;
        cursor: pointer;
    }

    #user-comments .sort li:last-child {
        margin-left: 0;
    }

    #user-comments .sort li p {
        font-size: 9pt;
        color: #8c8c8c;
        margin: 0;
        float: right;
    }

    #user-comments .sort li i {
        width: 17px;
        height: 16px;
        display: block;
        background: url(/images/slices.png) -345px -190px;
        float: right;
        margin-right: 15px;
    }

    #user-comments .sort li.active i {
        background-position: -344px -219px;
    }

    #user-comments .sort b {
        font-weight: normal;
        color: #2196F3;
        float: left;
        font-size: 10pt;
        margin: 5px 0 0 25px;
    }

    #user-comments .sort .horizental-line {
        width: 100%;
        height: 1px;
        background-color: #e1e1e1;
        float: right;
    }

    #user-comments > ul {
        padding: 0;
        margin: 30px 0 0 0;
        width: 100%;
        float: right;
    }

    .comment {
        width: 100%;
        float: right;
        box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.15);
        border-radius: 0 0 4px 4px;
        overflow: hidden;
        margin-bottom: 40px;
    }

    .comment .header {
        width: 1140px;
        padding: 15px;
        background-color: #f6f6f6;
        float: right;
        border-bottom: 1px solid #eeeeee;
    }

    .comment .header .user-name {
        float: right;
        width: 60%;
    }

    .comment .user-name i {
        width: 32px;
        height: 36px;
        float: right;
        background: url(/images/slices.png) -261px -538px;
        margin-left: 12px;
    }

    .comment .user-name i.buyer {
        background-position: -154px -538px;
    }

    .comment .user-name .name {
        font-size: 11pt;
        color: #3b3b3b;
        float: right;
        width: 92%;
        margin-top: 11px;
    }

    .comment .user-name .name span {
        font-size: 10.5pt;
        color: #FF5252;
    }

    .comment .user-name .date {
        font-size: 7.6pt;
        color: #838383;
        margin-top: 5px;
        float: right;
    }

    .comment .header .like {
        width: 32%;
        float: left;
    }

    .comment .like > p {
        font-size: 9.6pt;
        color: #6f6f6f;
        float: right;
        margin-left: 15px;
    }

    .comment .like ul {
        padding: 0;
        margin: 0;
        float: right;
    }

    .comment .like li {
        width: 45px;
        float: right;
        background-color: #fff;
        border: 1px solid #e4e4e4;
        padding: 5px 10px 3px 5px;
        margin: 7px 0 0 15px;
        border-radius: 2px;
        cursor: pointer;
    }

    .comment .like li i {
        width: 15px;
        height: 16px;
        float: right;
        background: url(/images/slices.png) -305px -190px;
        margin-left: 10px;
    }

    .comment .like .like-icon.active {
        background-position: -305px -220px;
    }

    .comment .like .dislike-icon {
        background-position: -265px -190px;
    }

    .comment .like .dislike-icon.active {
        background-position: -265px -220px;
    }

    .comment .like li p {
        margin: 3px 0 0 0;
        color: #aab5be;
        font-size: 9pt;
        float: right;
    }

    .comment .content {
        float: right;
        width: 1140px;
        padding: 40px 15px;
        background-color: #f8f8f8;
    }

    .comment .rate {
        float: right;
        width: 35%;
    }

    .comment .rate > span {
        height: 30px;
        display: block;
        background-color: #f1fcf8;
        border: 1px solid #5cb456;
        border-radius: 3px;
        font-size: 12pt;
        color: #5cb456;
        padding-right: 20px;
        border-right: 3px solid #5cb456;
        margin-bottom: 40px;
    }

    .comment .content ul {
        padding: 0;
        margin: 0;
        float: right;
        width: 100%;
    }

    .comment .content ul li {
        width: 100%;
        float: right;
        margin-bottom: 12px;
    }

    .comment .content li p {
        font-size: 9pt;
        color: #464646;
        float: right;
        width: 160px;
        margin: 0;
    }

    .comment .light {
        width: 45px;
        height: 8px;
        background-color: #efefef;
        float: right;
        margin: 3px 0 0 2px;
    }

    .comment .dark {
        display: block;
        position: absolute;
        background-color: #bebfc8;
        width: 45px;
        height: 8px;
        float: right;
    }

    .comment .description {
        float: left;
        width: 60%;
    }

    .comment .description h3 {
        font-size: 13.3pt;
        color: #727272;
        margin: 0 0 25px 0;
        font-weight: normal;
    }

    .comment .strong {
        float: right;
        width: 50%;
    }

    .comment .strong span {
        font-size: 10.5pt;
        color: #5cb456;
        display: block;
        margin-bottom: 12px;
    }

    .comment .strong i {
        width: 10px;
        height: 12px;
        display: block;
        background: url(/images/slices.png) -220px -81px;
        float: right;
    }

    .comment .strong p {
        margin: 0 12px 0 0;
        font-size: 9.2pt;
        color: #545454;
        float: right;
    }

    .comment .weak {
        float: left;
        width: 45%;
    }

    .comment .weak span {
        font-size: 10.5pt;
        color: #FF5252;
        display: block;
        margin-bottom: 12px;
    }

    .comment .weak i {
        width: 10px;
        height: 12px;
        display: block;
        background: url(/images/slices.png) -246px -81px;
        float: right;
    }

    .comment .weak p {
        margin: 0 12px 0 0;
        font-size: 9.2pt;
        color: #545454;
        float: right;
    }

    .comment .description > p {
        font-size: 10pt;
        color: #828282;
        margin: 30px 0 0 0;
        float: right;
        line-height: 28px;
    }

</style>

<div id="score">

    <p>
        <i></i>
        امتیاز کاربران به:

        <span>{{ $product->title }}</span>
    </p>

    @if($comments->count() > 0)

        <ul>
            @foreach($properties as $property)
                @php
                    $score = $property->score;
                    $integer = floor($score);
                    $decimal = $score - $integer;
                    $grayNum = $integer;
                @endphp
                <li>
                    <p>{{ $property->title }}</p>

                    @for($i = 0; $i < $integer; $i++)

                        <span class="gray">
                    <span class="green"></span>
                </span>

                    @endfor

                    @if($integer < 5)
                        @php
                            $grayNum++;
                        @endphp

                        <span class="gray">
                    <span class="green" style="width: {{ $decimal * 100 }}%;"></span>
                </span>

                    @endif

                    @php
                        $grayNumRemain = 5 - $grayNum;
                    @endphp

                    @for($i = 0; $i < $grayNumRemain; $i++)
                        <span class="gray"></span>
                    @endfor

                </li>
            @endforeach
        </ul>
    @else
        <div class="no-comment">
            <img src="/images/comment.gif">
            <p>هنوز برای این محصول نظری ثبت نشده است.</p>
        </div>
    @endif
</div>

<div id="send-comment">

    <h3>
        شما هم میتوانید در مورد این کالا نظر بدهید.
    </h3>

    <p>
        برای ثبت نظرات، نقد و بررسی شما لازم است ابتدا وارد حساب کاربری خود شوید. اگر این محصول را قبلا
        از دیجی کالا خریده باشید، نظر شما یه عنوان مالک محصول ثبت خواهد شد.
    </p>

    <a class="blue-btn" href="{{ route('comment.create', $product->id) }}">
        نظر خود را بنویسید
    </a>

</div>

@if($comments->count() > 0)
    <div id="user-comments">

        <div class="sort">

            <p>
                <i></i>
                نظرات کاربران
                <span>({{ $comments->count().' نظر' }})</span>
            </p>

            <ul>
                <li class="active" onclick="sortComments(this, 'new');">
                    <p>
                        جدیدترین نظرات
                    </p>
                    <i></i>
                </li>

                <li onclick="sortComments(this, 'useful');">
                    <p>
                        مفیدترین نظرات
                    </p>
                    <i></i>
                </li>
            </ul>

            <b>
                مرتب سازی بر اساس:
            </b>

            <div class="horizental-line"></div>

        </div>

        <ul>
            @foreach($comments as $comment)
                <li class="comment" id="comment{{ $comment->id }}">

                    <div class="header">

                        <div class="user-name">
                            <i class="buyer"></i>

                            <span class="name">
                            {{ $comment->user->first_name.' '.$comment->user->last_name }}
                                @php
                                    $userOrdersProducts = $comment->user->orders()->get()->map(function ($item) {
                                                return $item->products->pluck('id');
                                            });
                                @endphp
                                @if($userOrdersProducts->has($product->id))
                                    <span>(خریدار این محصول)</span>
                                @endif
                            </span>
                            <span class="date">{{ jdate($comment->created_at)->format('%Y/%m/%d') }}</span>
                        </div>
                        <div class="like comment-{{ $comment->id }}">

                            <p>
                                آیا این نظر برایتان مفید بود ؟
                            </p>
                            <ul>
                                <li class="like-count-{{ $comment->id }}"
                                    onclick="commentReaction({{ $comment->id }}, 1);">
                                    <i class="like-icon @if($comment->user_like) active @endif"></i>
                                    <p>{{ $comment->likes }}</p>
                                </li>

                                <li class="dislike-count-{{ $comment->id }}" onclick="commentReaction({{ $comment->id }}, 0);">
                                    <i class="dislike-icon @if($comment->user_dislike) active @endif"></i>
                                    <p>{{ $comment->dislikes }}</p>
                                </li>
                            </ul>

                        </div>

                    </div>
                    <div class="content">

                        <div class="rate">

                            <ul>
                                @foreach(commentScores($comment->id) as $score)
                                    <li>
                                        <p>{{ $score->title }}</p>

                                        @for($i = 1; $i<= $score->score; $i++)
                                            <span class="light">
                                                  <span class="dark"></span>
                                             </span>
                                        @endfor
                                        @for($i = 0; $i < 5 - $score->score; $i++)
                                            <span class="light"></span>
                                        @endfor
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="description">
                            <h3>{{ $comment->title }}</h3>

                            <div class="strong">
                                <span>نقاط قوت</span>
                                <i></i>
                                @if(json_decode($comment->positive) != NULL)
                                    @foreach(json_decode($comment->positive) as $positive)
                                        <p>["{{ $positive }}"]</p>
                                    @endforeach
                                @else
                                    <p>-</p>
                                @endif
                            </div>

                            <div class="weak">
                                <span>نقاط ضعف</span>
                                <i></i>
                                @if(json_decode($comment->negative) != NULL)
                                    @foreach(json_decode($comment->negative) as $negative)
                                        <p>["{{ $negative }}"]</p>
                                    @endforeach
                                @else
                                    <p>-</p>
                                @endif
                            </div>

                            <p>{{ $comment->comment }}</p>
                        </div>

                    </div>

                </li>
            @endforeach
        </ul>

    </div>

    <script>

        $(document).ready(function() {
            var hash = window.location.hash;
            if (hash) {
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 1000);
            }
        });

        function sortComments(tag, type) {
            $('.sort').find('li').removeClass('active');
            $(tag).addClass('active');

            $.ajax({
                type: 'POST',
                url: '{{ route('comment.sort', $product->id) }}',
                data: {type: type},
                success: function (msg) {

                    $('#user-comments > ul').html('');

                    $.each(msg, function (index, value) {

                        var buyer = '';
                        if (value['buyer'] === 1) {
                            buyer = '<span>(خریدار این محصول)</span>';
                        }

                        var dislikeActive = '';
                        if (value['user_dislike'] === true) {
                            dislikeActive = 'active';
                        }

                        var likeActive = '';
                        if (value['user_like'] === true) {
                            likeActive = 'active';
                        }

                        var scoreTag = '';
                        var rates = '';
                        $.each(value['scores'], function (index, score) {
                            for (var j = 1; j <= score['score']; j++) {
                                rates += '<span class="light"><span class="dark"></span></span>';
                            }
                            for (var k = 0; k < 5 - score['score']; k++) {
                                rates += '<span class="light"></span>';
                            }
                            scoreTag += '<li><p>' + score['title'] + '</p>' + rates + '</li>';
                            rates = '';
                        });

                        var positiveArray = JSON.parse(value['positive']);
                        var strong = '';
                        if (positiveArray !== null) {
                            $.each(positiveArray, function (index, positive) {
                                strong += '<p>["' + positive + '"]</p>';
                            });
                        } else {
                            strong = '<p>-</p>';
                        }

                        var negativeArray = JSON.parse(value['negative']);
                        var weak = '';
                        if (negativeArray !== null) {
                            $.each(negativeArray, function (index, negative) {
                                weak += '<p>["' + negative + '"]</p>';
                            })
                        } else {
                            weak = '<p>-</p>';
                        }

                        var comment = '<li class="comment" id="comment' + value['id'] + '"><div class="header"><div class="user-name"><i class="buyer"></i><span class="name">' + value['user_name'] + ' ' + buyer + '</span><span class="date">' + value['date'] + '</span></div><div class="like comment-' + value['id'] + '"><p>آیا این نظر برایتان مفید بود ؟</p><ul><li class="like-count-' + value['id'] + '" onclick="commentReaction(' + value['id'] + ', 1);"><i class="like-icon ' + likeActive + '"></i><p>' + value['likes'] + '</p></li><li class="dislike-count-' + value['id'] + '" onclick="commentReaction(' + value['id'] + ', 0);"><i class="dislike-icon ' + dislikeActive + '"></i><p>' + value['dislikes'] + '</p></li></ul></div></div><div class="content"><div class="rate"><ul>' + scoreTag + '</ul></div><div class="description"><h3>' + value['title'] + '</h3><div class="strong"><span>نقاط قوت</span><i></i>' + strong + '</div><div class="weak"><span>نقاط ضعف</span><i></i>' + weak + '</div><p>' + value['comment'] + '</p></div></div></li>';

                        $('#user-comments > ul').append(comment);
                    });
                }
            });
        }

        function commentReaction(commentID, type) {
            if (type === 1) {
                var reaction = 'like';
            } else {
                reaction = 'dislike';
            }
            $.ajax({
                type: 'POST',
                url: '/comment/' + commentID + '/reaction',
                data: {'type': type},
                success: function (msg) {
                    Swal.fire({
                        position: 'top-start',
                        icon: 'success',
                        title: 'انجام شد.',
                        showConfirmButton: false,
                        timer: 1200,
                    })

                    var reactionCount = $('.' + reaction + '-count-' + commentID);
                    var icon = reactionCount.find('i');

                    $('.comment-'+ commentID).find('li p').text(msg.oldReact);
                    reactionCount.find('p').text(msg.reaction);

                    if (icon.hasClass('active')) {
                        icon.removeClass('active');
                    } else {
                        $('.comment-'+ commentID).find('i').removeClass('active');
                        icon.addClass('active');
                    }
                },
            });
        }

    </script>
@endif
