@component('admin.layouts.content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .title p {
            font-family: yekan-exbold;
            text-align: center;
            color: white;
            background-color: #c80083;
            border-radius: 5px;
            margin: 15px 55px 50px 55px;
            padding: 10px;
        }
    </style>

    <div class="title">
        <p>نمودار آمار فروش  و عضویت در سایت در ۷ روز اخیر</p>
    </div>

    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script>

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [@foreach($dates as $date) '{{ jdate($date)->format('%Y-%m-%d') }}', @endforeach],
                datasets: [{
                    label: 'Orders',
                    data: [@foreach($orderStat as $stat) '{{ $stat }}', @endforeach],
                    borderWidth: 2,
                }, {
                    label: 'Members',
                    data: [@foreach($memberStat as $stat) '{{ $stat }}', @endforeach],
                    borderWidth: 2,
                }

                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0, // تعداد اعشار را صفر قرار دهید
                        }
                    }
                },
            }
        });


    </script>
@endcomponent
