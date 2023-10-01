@component('layouts.content')

    <link href="https://vjs.zencdn.net/8.5.2/video-js.css" rel="stylesheet"/>
    <script src="https://vjs.zencdn.net/8.5.2/video.min.js"></script>

    <style>

        #magazine {
            width: 900px;
            margin: 20px auto;
        }

        #magazine::after {
            content: '';
            display: block;
            clear: both;
        }

        #readable {
            width: 900px;
            float: right;
            overflow-x: hidden;
        }

        #readable .content {
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, .1);
            padding: 0 50px;
            background-color: #fff;
            margin: 20px 0;
            float: right;
            width: 800px;
        }

        #readable .title {
            padding-top: 40px;
            float: right;
            width: 100%;
        }

        #readable .entry-title {
            font-size: 14pt;
            font-family: yekan-exbold;
            color: #777;
            width: 65%;
            float: right;
            line-height: 2.2;
        }

        #readable .social-act {
            width: 32%;
            float: left;
            margin-top: 10px;
        }

        #readable .heart, .save {
            width: 24px;
            height: 24px;
            display: inline-block;
            background: url(/images/heart.png);
            cursor: pointer;
        }

        #readable .save {
            background: url(/images/save.png);
        }

        #readable .line {
            width: 1px;
            height: 24px;
            margin: 0 20px;
            background-color: #9ba4ab;
            display: inline-block;
        }

        #readable .title .text {
            font-family: yekan-regular;
            font-size: 8pt;
            color: #9ba4ab;
            position: relative;
            bottom: 8px;
            margin-left: 5px;
            cursor: pointer;
        }

        #readable .time {
            width: 100%;
            margin: 30px 0;
            float: right;
            font-size: 9pt;
            color: #9196A3;
        }

        #readable .date, .reading-time {
            float: right;
            width: 50%;
        }

        #readable .date i {
            background: url(/images/clock.png);
            width: 16px;
            height: 16px;
            display: inline-block;
            margin-left: 3px;
        }

        #readable .date span {
            position: relative;
            bottom: 3px;
        }

        #readable .date div {
            width: 1px;
            height: 14px;
            background-color: #b4bdc4;
            display: inline-block;
            margin: 0 1px;
        }

        #readable .reading-time i {
            background: url(/images/stopwatch.png);
            width: 16px;
            height: 16px;
            display: inline-block;
            margin-right: 3px;
            position: relative;
            top: 3px;
        }

        #readable .reading-time {
            text-align: left;
        }

        #readable article {
            float: right;
            color: #797979;
            line-height: 32px;
            font-family: yekan-regular;
            text-align: justify;
            margin-bottom: 40px;
        }

        #readable .video, .image {
            text-align: center;
            margin-bottom: 30px;
        }

        #readable .video video {
            border-radius: 5px;
        }

        #same-mag {
            width: 21%;
            float: left;
            background-color: #fff;
        }

        .video-js * {
            direction: ltr !important;
        }

        .vjs-control-bar {
            font-size: 13px;
        }

        .vjs-menu {
            font-size: 10px;
        }

    </style>

    <div id="magazine">

        <div id="readable">
            <div class="content">

                <div class="title">
                    <div class="entry-title">{{ $article->title }}</div>
                    <div class="social-act">

                    <span class="text">
                        افزودن به لیست علاقه مندی ها
                    </span>
                        <i class="save"></i>
                        <div class="line"></div>
                        <i class="heart"></i>

                    </div>
                </div>

                <div class="time">
                    <div class="date">
                        <i></i>
                        <span>{{ jdate($article->created_at)->format('%Y/%m/%d') }}</span>
                        <div></div>
                        <span>{{ jdate($article->created_at)->format('H:i') }}</span>
                    </div>
                    @if(! $article->is_video)
                        <div class="reading-time">
                    <span>
                        زمان مورد نیاز برای مطالعه:
                    </span>
                            <span>{{ $article->reading_time.' دقیقه' }}</span>
                            <i></i>
                        </div>
                    @endif
                </div>
                @if($article->is_video)
                    <div class="video">
                        <video id="my-video" class="video-js" controls preload="auto" width="800px" controls
                               poster="{{ $article->image }}">
                            <source src="{{ $article->video }}" type="video/mp4" size="1080">
                            @if($article->videos)
                                @foreach($article->videos as $video)
                                    <source src="{{ $video }}" type="video/mp4"
                                            size="{{ \Illuminate\Support\Facades\File::name($video) }}">
                                @endforeach
                            @endif
                        </video>
                    </div>
                @else
                    <div class="image">
                        <img src="{{ $article->image }}" width="800">
                    </div>

                @endif

                <article>{{ $article->article }}</article>

            </div>
        </div>

        <div id="same-mag"></div>

    </div>

    <script>

        var player = videojs('my-video');

        var qualityMenu = player.controlBar.addChild('MenuButton');

        var button = qualityMenu.el().getElementsByTagName('button')[0];
        button.innerHTML = '<span class="vjs-icon-placeholder vjs-icon-hd" aria-hidden="true"></span><span class="vjs-control-text" aria-live="polite"></span>';

        var item = document.createElement('li');
        item.className = 'vjs-menu-title';
        item.innerHTML = 'Quality';
        qualityMenu.menu.contentEl().appendChild(item);

        var videos = [
            @foreach($article->videos as $video)
                '{{ '/'.$video }}',
            @endforeach
        ];

        var currentTime = 0;
        videos.forEach(function (video) {
            var menuItem = document.createElement('li');
            menuItem.className = 'vjs-menu-item';
            menuItem.innerHTML = video.substring(video.lastIndexOf('/') + 1, video.lastIndexOf('.')) + 'p';
            qualityMenu.menu.contentEl().appendChild(menuItem);

            menuItem.addEventListener('click', function () {
                currentTime = player.currentTime();
                player.src(video);
                player.currentTime(currentTime);
                player.play();
            });
        });

    </script>
@endcomponent
