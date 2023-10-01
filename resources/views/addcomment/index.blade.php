@component('layouts.content')
    <style>

        #main {
            width: 1200px;
            margin: 10px auto;
        }

        #add-score, #add-comment {
            background: #fff;
            margin-top: 10px;
            box-shadow: 0 2px 2px rgba(0, 0, 0, .04);
            border-radius: 4px;
            float: right;
            padding: 20px;
        }

        #add-score .image {
            float: right;
            margin-left: 20px;
            width: 350px;
        }

        #add-score .image img {
            margin-bottom: 20px;
            width: 350px;
        }

        #add-score .image p {
            text-align: center;
            color: #4a4a4a;
            font-size: 9.5pt;
            margin: 2px 0 20px 0;
        }

        #add-score .image .en-title {
            font-family: yekan-exbold;
        }

        #add-score .score {
            float: right;
            width: 65%;
        }

        .title {
            font-size: 12pt;
            color: #4b4b4b;
            margin: 0 0 35px 0;
        }

        #add-score .score .score-three {
            width: 50%;
            float: left;
            margin: 10px 0;
        }

        #add-score .score .score-one {
            float: left;
            margin-left: 10px;
        }

        #add-score .score-one p {
            margin: 60px 0 -20px 0;
            color: #848484;
            font-size: 9.3pt;
        }

        #add-comment .title {
            margin: 20px 0 70px 0;
        }

        #add-comment .row1, .row2, .row3 {
            width: 100%;
            float: right;
            margin-bottom: 30px;
        }

        #add-comment .row1 span {
            font-size: 10pt;
            color: #4b4b4b;
        }

        #add-comment .row1 input {
            width: 800px;
            height: 32px;
            border: 1px solid #e2e2e2;
            display: block;
            border-radius: 2px;
            margin-top: 5px;
        }

        #add-comment .row2 .positive, .negative {
            float: right;
            width: 48%;
        }

        #add-comment .row2 .add-more {
            width: 24px;
            height: 24px;
            display: inline-block;
            background: url("/images/plus-green.png");
            position: relative;
            top: 8px;
            cursor: pointer;
        }

        #add-comment .row2 .negative .add-more {
            background: url("/images/plus-red.png");
        }

        #add-comment .row2 .positive p {
            color: #41BA29;
            font-size: 10pt;
        }

        #add-comment .row2 .negative p {
            color: #af2b2b;
            font-size: 10pt;
        }

        #add-comment .row2 input {
            width: 400px;
            height: 32px;
            border: 1px solid #e2e2e2;
            display: inline-block;
            border-radius: 2px;
            margin-top: 5px;
        }

        #add-comment .row3 span {
            color: #4b4b4b;
            font-size: 10pt;
        }

        #add-comment .row3 textarea {
            width: 100%;
            height: 200px;
            border: 1px solid #d3d3d3;
            border-radius: 3px;
            margin: 5px 0 30px 0;
            font-size: 9.3pt;
        }

        .irs.irs--square {
            width: 20rem;
        }

        .irs-from, .irs-to, .irs-single {
            top: 48px !important;
        }

    </style>



    <div id="main">

        <div id="navigation-bar">

            <ul>
                <li>
                    <span class="four"></span>
                    <a href="index/index">
                        فروشگاه اینترنتی دیجی کالا
                    </a>
                    <span></span>
                </li>

                <li>
                    <a href="{{ route('product', $product->id) }}">
                        {{ $product->title }}
                    </a>
                    <span></span>
                </li>

                <li>
                    نظرات کاربران
                </li>
            </ul>

        </div>

        <form
            action="@if(isset($comment)) {{ route('comment.update', $comment->id) }} @else {{ route('comment.store', $product->id) }} @endif"
            method="post" id="comment-form">
            @csrf
            @if(isset($comment))
                @method('PATCH')
            @endif

            <div id="add-score">

                <div class="image">
                    <img src="/images/products/{{ $product->id }}/product-{{ $product->id }}.jpg">
                    <p class="en-title">{{ $product->en_title }}</p>
                    <p class="fa-title">{{ $product->title }}</p>
                </div>

                <div class="score">

                    <p class="title">
                        امتیاز شما به این محصول
                    </p>

                    @php
                        $arrayLength = $properties->count();
                        $arrayHalf = ceil($arrayLength / 2);
                        $remainHalf = $arrayLength - $arrayHalf;
                        $leftProperties = $properties->get()->slice(0, $arrayHalf);
                        $rightProperties = $properties->get()->slice($arrayHalf, $remainHalf);
                    @endphp

                    <div class="score-three">
                        @foreach($leftProperties as $property)
                            <div class="score-one">
                                <p>{{ $property->title }}</p>
                                <input type="text" id="property-{{ $property->id }}" name="property-{{ $property->id }}"
                                       value=""/>
                            </div>
                            @if(isset($comment))
                                <script>
                                    propertySlider('property-{{ $property->id }}', {{ DB::table('product_scores')->where('property_id', $property->id)->where('comment_id', $comment->id)->first()->score }}, true);
                                </script>
                            @else
                                <script>
                                    propertySlider('property-{{ $property->id }}', 3, false);
                                </script>
                            @endif
                        @endforeach
                    </div>

                    <div class="score-three">
                        @foreach($rightProperties as $property)
                            <div class="score-one">
                                <p>{{ $property->title }}</p>
                                <input type="text" id="property-{{ $property->id }}" name="property-{{ $property->id }}"
                                       value=""/>
                            </div>
                            @if(isset($comment))
                                <script>
                                    propertySlider('property-{{ $property->id }}', {{ DB::table('product_scores')->where('property_id', $property->id)->where('comment_id', $comment->id)->first()->score }}, true);
                                </script>
                            @else
                                <script>
                                    propertySlider('property-{{ $property->id }}', 3, false);
                                </script>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div id="add-comment">

                    @include('layouts.errors')

                    <p class="title">
                        دیگران را با نوشتن نقد، بررسی و نظرات خود، برای انتخاب این محصول راهنمایی کنید.
                    </p>

                    <div class="row1">
                        <span>عنوان نقد و بررسی شما (اجباری)</span>
                        <input type="text" name="title"
                               value="@if(isset($comment)) {{ old('title', $comment->title) }} @else {{ old('title') }} @endif">
                    </div>

                    <div class="row2">
                        <div class="positive">
                            <p>
                                نقاط قوت
                            </p>

                            @if(isset($comment) && $comment->positive != null)
                                @foreach(json_decode($comment->positive) as $positive)
                                    <input name="positive[]" value="{{ $positive }}">
                                @endforeach
                            @else
                                <input name="positive[]" value="">
                            @endif

                            <span class="add-more" onclick="addInputBox(this, 'positive');"></span>
                        </div>
                        <div class="negative">
                            <p>
                                نقاط ضعف
                            </p>
                            @if(isset($comment) && $comment->negative != null)
                                @foreach(json_decode($comment->negative) as $negative)
                                <input name="negative[]" value="{{ $negative }}">
                                @endforeach
                            @else
                                <input name="negative[]">
                            @endif
                            <span class="add-more" onclick="addInputBox(this, 'negative');"></span>
                        </div>
                    </div>

                    <div class="row3">
                         <span>
                                 متن نقد و بررسی شما (اجباری)
                         </span>

                        <textarea name="comment">@if(isset($comment)) {{ old('comment', $comment->comment) }} @else {{ old('comment') }} @endif</textarea>
                    </div>

                    <a class="blue-btn" onclick="submitForm('comment-form');">
                        ثبت نقد و بررسی
                    </a>


                </div>

            </div>

        </form>

    </div>

    <script>
        function addInputBox(tag, name) {
            var icon = $(tag);
            var parent = icon.parent('div');
            var inputTag = '<input name="' + name + '[]" value="">';
            parent.append(inputTag);
        }
    </script>

@endcomponent
