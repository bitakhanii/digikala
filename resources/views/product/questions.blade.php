<script src="/bootstrap/bootstrap.min.js"></script>
<link href="/bootstrap/bootstrap.css" rel="stylesheet">
<script src="/bootstrapSelect/bootstrap-select.js"></script>
<link href="/bootstrapSelect/bootstrap-select.css" rel="stylesheet">

<style>

    #questions {
        width: 1170px;
        float: right;
        background-color: #fff;
        padding: 20px 15px;
    }

    #questions > p {
        margin: 25px 0 20px 0;
        font-size: 12pt;
        color: #393939;
    }

    #questions > p i {
        width: 5px;
        height: 8px;
        display: inline-block;
        background: url(/images/slices.png) -37px -652px;
        margin-left: 12px;
    }

    #questions > form textarea {
        width: 1138px;
        height: 150px;
        border: 1px solid #e9e9e9;
        border-radius: 3px;
        font-size: 10pt;
        color: #6D6D6D;
        text-align: right;
        resize: none;
        padding: 8px 15px;
        margin-bottom: 15px;
    }

    .user-question {
        width: 100%;
        float: right;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.15);
        margin: 20px 0 5px 0;
        color: #646464;
        border-radius: 3px;
        overflow: hidden;
    }

    .user-question .header {
        width: 1140px;
        background-color: #efefef;
        padding: 5px 15px;
        float: right;
        font-size: 10.5pt;
        line-height: 30px;
    }

    .user-question .header i {
        width: 20px;
        height: 20px;
        background: url(/images/slices.png) -284px -126px;
        margin: 5px 0 0 8px;
        float: right;
    }

    .user-question .header p {
        float: left;
        margin: 0;
        direction: ltr;
    }

    .user-question .content {
        width: 1140px;
        background-color: #f8f8f8;
        float: right;
        padding: 25px 15px;
        font-size: 10pt;
    }

    .user-question .content p {
        margin: 0;
    }

    .answer {
        width: 90%;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.15);
        margin: 5px auto 40px auto;
        color: #646464;
        border-radius: 3px;
        overflow: hidden;
    }

    .answer .header {
        width: 1050px;
        background-color: #dae5ef;
        padding: 5px 15px;
        float: right;
        font-size: 10.5pt;
        line-height: 30px;
    }

    .answer .header i {
        width: 20px;
        height: 20px;
        background: url(/images/slices.png) -284px -126px;
        margin: 5px 0 0 8px;
        float: right;
    }

    .answer .header p {
        float: left;
        margin: 0 0 0 20px;
        direction: ltr;
    }

    .answer .content {
        width: 1050px;
        background-color: #ffffff;
        float: right;
        padding: 25px 15px;
        font-size: 10pt;
    }

    .answer .content p {
        margin: 0;
    }

    .reply-to-question {
        float: left;
        cursor: pointer;
        margin-bottom: 15px;
    }

    .reply-to-question i {
        width: 16px;
        height: 12px;
        display: block;
        background: url(/images/slices.png) -30px -595px;
        float: right;
        margin: 5px 0 0 10px;
    }

    .reply-to-question p {
        margin: 0;
        color: #2196F3;
        font-size: 10pt;
        float: right;
    }

</style>

<p>
    <i></i>
    پرسش خود را مطرح نمایید
</p>

<form action="{{ route('question.store', $product->id) }}" method="post" id="question-form">
    @csrf
    <textarea name="question" placeholder="متن پرسش خود را اینجا بنویسید..."></textarea>

    <span class="blue-btn" onclick="$('#question-form').submit();">ثبت پرسش</span>
</form>

@if($product->questions()->count() > 0)

    @foreach($questions as $question)

        <div class="user-question">

            <div class="header">

                <i></i>

                <span>پرسش</span>

                <p>
                    توسط {{ $question->user->first_name.' '.$question->user->last_name }}
                    - {{ jdate($question->created_at)->format('%Y/%m/%d') }}
                </p>
            </div>

            <div class="content">
                {{ $question->question }}
            </div>

        </div>

        <div class="reply-to-question">

            <i></i>

            <p data-toggle="modal" data-target="#answer-modal-{{ $question->id }}">
                به این پرسش پاسخ دهید
            </p>

        </div>

        <div class="modal fade" id="answer-modal-{{ $question->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">پاسخ خود را وارد کنید.</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('question.store', $product->id) }}" method="post"
                              id="answer-form-{{ $question->id }}">
                            @csrf
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">متن پاسخ:</label>
                                <textarea class="form-control" id="message-text" name="question"></textarea>
                                <input type="hidden" name="parent" value="{{ $question->id }}">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                        <button type="button" class="btn btn-primary"
                                onclick="$('#answer-form-{{ $question->id }}').submit();">ثبت پاسخ
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>

            /*Show the Modal Window*/
            $('#answer-modal-{{ $question->id }}').on('shown.bs.modal');

        </script>

        @if($question->answers->count() > 0)
            @foreach($question->answers as $answer)
                <div class="answer">

                    <div class="header">
                        <span>پاسخ</span>
                        <p>
                            توسط {{ $answer->user->first_name.' '.$answer->user->last_name }}
                            - {{ jdate($answer->created_at)->format('%Y/%m/%d') }}
                        </p>
                    </div>

                    <div class="content">
                        <p>{{ $answer->question }}</p>
                    </div>

                </div>
            @endforeach
        @endif
    @endforeach
@endif
