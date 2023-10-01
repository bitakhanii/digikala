<style>

    .no-item-table .head td:last-child {
        text-align: right !important;
    }

    .no-item-table .value td {
        text-align: right;
    }

    .no-item-table .head td {
        padding: 8px 5px 14px 0;
    }

</style>

<section id="my-messages">

    <table class="no-item-table" cellspacing="0">

        <tbody>
        <tr class="head">
            <td>عنوان</td>
            <td>متن</td>
            <td>وضعیت</td>
        </tr>

        @foreach($messages as $message)

            <tr class="value">
                <td>{{ $message->title }}</td>
                <td>{{ $message->message }}</td>
                <td>
                    @if($message->status)
                        خوانده شده
                    @else
                        خوانده نشده
                    @endif
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

</section>
