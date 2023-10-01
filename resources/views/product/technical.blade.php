<style>

    #technical {
        width: 1173px;
        float: right;
        background-color: #fff;
        padding: 20px 12px 30px 15px;
    }

    #technical > h3 {
        font-size: 16pt;
        color: #555555;
        margin: 15px 0 35px 0;
        font-weight: normal;
    }

    #technical > .name {
        margin: 0;
        font-size: 10pt;
        color: #858585;
        margin-bottom: 20px;
    }

    #technical div {
        width: 100%;
        float: right;
    }

    #technical div .title {
        margin: 40px 0;
        font-size: 11pt;
        color: #393939;
    }

    #technical div .title i {
        width: 5px;
        height: 8px;
        display: inline-block;
        background: url(/images/slices.png) -37px -652px;
        margin-left: 12px;
    }

    #technical ul {
        padding: 0;
        margin: 0;
        width: 100%;
        float: right;
    }

    #technical ul li {
        width: 100%;
        margin-bottom: 12px;
        float: right;
    }

    #technical .property, #technical .value {
        display: block;
        border-radius: 3px;
        color: #505050;
        font-size: 10pt;
        line-height: 40px;
        padding: 0 22px;
    }

    #technical li .property {
        width: 15%;
        background-color: #f1f1f1;
        float: right;
    }

    #technical li .value {
        width: 76%;
        float: left;
        background-color: #f3f7f4;
    }

</style>

<h3>
    مشخصات
</h3>

<p class="name">{{ $product->title }}</p>

<div>
    @foreach($attributes as $attribute)
        <ul>
            <li>
                <span class="property">{{ $attribute->title }}</span>

                @if($attribute->pivot->value->value)
                    <span class="value">{{ $attribute->pivot->value->value }}</span>
                @else
                    <span class="value">-</span>
                @endif
            </li>
        </ul>
    @endforeach
</div>
