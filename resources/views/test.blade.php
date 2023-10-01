{{--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/js/jquery-3.6.4.min.js"></script>
    <link href="/flipclock/css/flipclock.css" rel="stylesheet">
    <script src="/flipclock/js/flipclock.min.js"></script>

    <style>
        .clock {
        / / transform: scale(.32);
        }
    </style>
</head>
<body>
<div class="clock" style="margin:2em;"></div>

<script type="text/javascript">

    /*$(document).ready(function() {

        // Instantiate a counter
        clock = new FlipClock($('.clock'), {
            clockFace: 'Counter',
            autoStart: true,
            minimumDigits: 6,
            date: '',
            direction: 'down'
        });
    });*/

    var targetTime = 1696188076; // زمان مورد نظر شما

    console.log(Date.now());

    // محاسبه زمان باقی‌مانده تا زمان مورد نظر
    var currentTime = Math.floor(Date.now() / 1000);
    var remainingTime = targetTime - currentTime;

    // ایجاد تایمر شمارش معکوس با استفاده از FlipClock
    var clock = $('.clock').FlipClock(remainingTime, {
        clockFace: 'HourlyCounter',
        countdown: true,
        autoStart: true
    });

    $('.flip-clock-label').remove();

</script>
</body>
</html>--}}


@component('layouts.content')

    {{--<script>
        function createClock(remainingTime) {
            var clock = $('.clock').FlipClock(remainingTime, {
                clockFace: 'HourlyCounter',
                countdown: true,
                autoStart: true
            });
            $('.flip-clock-label').remove();
            return clock;
        }
    </script>--}}

    @foreach($products as $product)
        <div class="clock-{{ $product->id }}" style="margin:2em;"></div>

        @if($product->special_time > time())
            <script type="text/javascript">

                var targetTime = {{ $product->special_time }};
                var currentTime = Math.floor(Date.now() / 1000);
                var remainingTime = targetTime > currentTime ? targetTime - currentTime : 0;

                var clocks = [];

                clocks.push($('.clock-' + {{ $product->id }}).FlipClock(remainingTime, {
                    clockFace: 'DailyCounter',
                    countdown: true,
                    autoStart: true
                }));
                $('.flip-clock-label').remove();

            </script>
        @endif
    @endforeach

@endcomponent
