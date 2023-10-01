<style>

    #my-comments > table {
        width: 100%;
        margin-bottom: 15px;
    }

    #my-comments table .head {
        font-size: 11pt;
        color: #fff;
        background-color: #3c3c3c;
    }

    #my-comments table td {
        text-align: center;
    }

    #my-comments .head td:first-child {
        text-align: right;
    }

    #my-comments table .head td {
        padding: 8px 15px 14px 10px;
    }

    #my-comments table .value {
        background-color: #fff;
        font-size: 8.5pt;
        color: #393939;
    }

    #my-comments table .value td {
        border-bottom: 1px solid #ddd;
        padding: 25px 18px;
    }

    #my-comments .value td:first-child {
        color: #6B6B6B;
        font-size: 8pt;
        font-family: yekan-exbold;
        width: 58%;
        text-align: right;
    }

    #my-comments .value i {
        cursor: pointer;
        width: 18px;
        height: 18px;
        display: block;
    }

    #my-comments .value td:nth-child(4) i {
        background: url(/images/view.gif);
    }

    #my-comments .value td:nth-child(5) i {
        background: url(/images/edit.gif);
    }

    #my-comments .value td:nth-child(6) i {
        width: 15px;
        height: 15px;
        background: url(/images/delete.gif);
    }

</style>

<section id="my-comments">

    <table cellspacing="0">

        <tbody>
        <tr class="head">
            <td>نظر برای</td>
            <td>می پسندم</td>
            <td>وضعیت</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        @foreach($comments as $comment)
            <tr class="value">
                <td>{{ $comment->commentable->title }}</td>
                <td>{{ $comment->likes }}</td>
                <td>
                    @if($comment->approved)
                        منتشر شده
                    @else
                        منتشر نشده
                    @endif
                </td>
                <td>
                    @php
                        // TODO create edit comment route
                    @endphp
                    <a href="{{ url('/product/'.$comment->commentable->id.'#comment'.$comment->id) }}">
                        <i title="مشاهده نظر"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('comment.edit', $comment->id) }}">
                        <i title="ویرایش نظر"></i>
                    </a>
                </td>
                <td>
                    <i title="حذف نظر" onclick="deleteComment({{ $comment->id }} , this);"></i>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>

</section>

<script>

    function deleteComment(commentID, tag) {

        var icon = $(tag);
        var comment = icon.parents('tr.value');

        $.ajax({
            type: 'DELETE',
            url: 'comment/' + commentID,
            data: {},
            success: function (msg) {
                comment.remove();
            }
        });
    }

</script>
