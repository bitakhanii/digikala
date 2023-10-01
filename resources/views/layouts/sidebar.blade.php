@php
    $articles = \App\Models\Article::articles(2);
    $videos = \App\Models\Article::videos(2);
    $posters = getPosters('sidebar');
    $news = \App\Models\Article::news(4);
@endphp

<style>

    #sidebar {
        width: 23%;
        float: right;
        margin-top: 10px;
    }

    #readable {
        padding: 0;
        margin: 0;
    }

    #readable li {
        margin-bottom: 10px;
        border: 1px solid #e8e8e8;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
    }

    #readable li a.video .background::before {
        content: "";
        background-color: rgba(0, 0, 0, .3);
        width: 100%;
        height: 160px;
        display: block;
        position: absolute;
    }

    #readable li .background {
        height: 160px;
        display: block;
        position: relative;
    }

    #readable li img {
        width: 100%;
        height: 160px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
    }

    #readable li .circle {
        width: 65px;
        height: 65px;
        display: block;
        border-radius: 100%;
        background-color: rgba(255, 255, 255, .3);
        position: absolute;
        top: 45px;
        left: 0;
        right: 0;
        margin: auto;
        transition: background-color 300ms linear;
    }

    #readable li:hover .circle {
        background-color: rgba(255, 255, 255, .5) !important;
    }

    #readable li .circle span {
        background: url(/images/slices.png) -910px -689px;
        width: 21px;
        height: 21px;
        display: block;
        position: relative;
        top: 22px;
        right: 20px;
    }

    #readable li .tv-time {
        width: 48px;
        height: 20px;
        display: block;
        background-color: rgba(255, 255, 255, .3);
        position: absolute;
        bottom: 12px;
        right: 10px;
        color: #fff;
        font-size: 9.2pt;
        text-align: center;
        line-height: 24px;
        border-radius: 4px;
    }

    #readable li .title {
        height: 50px;
        padding: 10px 20px;
        background-color: #fff;
        color: #3f3f3f;
        font-size: 9pt;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #poster {
        margin-top: 20px;
    }

    #poster li {
        width: 100%;
        margin-bottom: 10px;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .2);
        cursor: pointer;
    }

    #poster a {
        display: block;
    }

    #poster li img {
        width: 100%;
    }

    #last-news {
        width: 100%;
        background-color: #fff;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 5px #e3e7e3;
        position: relative;
        margin-bottom: 20px;
    }

    #last-news > .title {
        background-color: #f7f9fa;
        height: 40px;
        color: #737373;
        padding-right: 15px;
        line-height: 40px;
        font-size: 10pt;
        font-family: yekan-exbold;
    }

    #last-news ul li {
        float: right;
        margin-bottom: 10px;
    }

    #last-news ul li a {
        padding: 10px;
        display: block;
        float: right;
        cursor: pointer;
    }

    #last-news .news-img {
        float: right;
    }

    #last-news .news-img img {
        border-radius: 100%;
    }

    #last-news .news-txt {
        float: right;
        margin-right: 25px;
        width: 170px;
    }

    #last-news .news-txt p {
        margin: 0;
    }

    #last-news .news-txt .title {
        color: #6a6b6a;
        font-size: 9pt;
        margin-bottom: 5px;
    }

    #last-news .news-txt .date {
        font-size: 8pt;
        color: #a4a6a4;
    }

    #last-news .more-news {
        float: left;
        margin: 0 0 15px 15px;
        color: #0085e4;
        cursor: pointer;
        font-size: 9pt;
    }

</style>

<div id="sidebar">

    <ul id="readable">

        @foreach($articles as $article)

            <li>
                <a href="{{ route('article', $article->id) }}">
                    <div class="background">
                        <img src="{{ $article->resize_image }}">
                    </div>
                    <div class="title">
                     <span>
                         {{ $article->title }}
                     </span>
                    </div>
                </a>
            </li>

        @endforeach

        @foreach($videos as $video)

            <li>
                <a class="video" href="{{ route('article', $video->id) }}">
                    <div class="background">
                        <img src="{{ $video->resize_image }}">

                        <span class="circle">
                <span></span>
            </span>

                        {{-- <span class="tv-time"><?= $readable['videotime']; ?></span>--}}

                    </div>
                    <div class="title">{{ $video->title }}</div>
                </a>
            </li>

        @endforeach

    </ul>

    <ul id="poster">

        @foreach($posters as $poster)

            <li>
                <a>
                    <img alt="{{ $poster->alt }}" src="{{ $poster->image }}">
                </a>
            </li>

        @endforeach

    </ul>

    <div id="last-news">

        <div class="title">
            تازه ترین خبرها
        </div>

        <ul>

            @foreach($news as $new)

                <li>
                    <a href="{{ route('article', $new->id) }}">
                        <div class="news-img">
                            <img src="{{ $new->resize_image }}" width="60" height="60">
                        </div>

                        <div class="news-txt">
                            <p class="title">{{ $new->title }}</p>
                            <p class="date">{{ engToPersian(jdate($new->created_at)->format('%Y/%m/%d')) }}</p>
                        </div>
                    </a>
                </li>

            @endforeach

        </ul>

        <div class="more-news">
            <a>
                مشاهده خبرهای بیشتر
            </a>
        </div>

    </div>

</div>
