<style>

    #filters-selected {
        width: 100%;
        margin-bottom: 15px;
        padding-right: 25px;
    }

    #filters-selected .filter-show {
        font-size: 7.5pt;
        color: #4A4A4F;
        height: 18px;
        display: inline-block;
        background-color: #fff;
        border: 1px solid #c5cbca;
        border-radius: 5px;
        box-shadow: 0 -5px 10px 1px #E8ECEB inset;
        margin: 0 0 3px 5px;
        padding: 2px 5px 2px 0;
    }

    #filters-selected .remove-filter {
        width: 7px;
        height: 7px;
        display: inline-block;
        margin-right: 8px;
        background: url(/images/spritefiltercontrols.png);
        background-position: -58px -385px;
        position: relative;
        left: 4px;
        top: 1px;
        cursor: pointer;
    }

    #filter {
        float: right;
    }

    #filter > li {
        width: 132px;
        height: 24px;
        background-color: #f4f5fa;
        border: 1px solid #dddee3;
        border-radius: 4px;
        float: right;
        margin-left: 4px;
        font-size: 8.5pt;
        padding-right: 5px;
        line-height: 22px;
        color: #4A4A4F;
        cursor: pointer;
        position: relative;
    }

    #filter > li.active {
        background-color: #fff;
        z-index: 3;
        border-bottom: none;
        height: 30px;
        box-shadow: -1px 1px 2px #d2d2d8;
    }

    #filter > li > p {
        margin: 0;
    }

    #filter > li > p > span {
        background: url(/images/side-arrow.gif) 0 -4px;
        float: left;
        width: 4px;
        height: 13px;
        display: block;
        margin: 8px 0 0 5px;
    }

    #filter > li.active > p > span {
        transform: rotate(270deg);
        margin: 7px 0 0 10px;
    }

    #filter .values {
        display: none;
        width: 170px;
        max-height: 120px;
        background-color: #fff;
        box-shadow: -2px 2px 2px 1px #e7e7ed;
        border-right: 1px solid #dddee3;
        position: absolute;
        right: -1px;
        top: 28px;
        overflow-y: auto;
        overflow-x: hidden;
        z-index: 2;
    }

    #filter .values ul p {
        margin: 0;
        font-size: 8pt;
        color: #5c5c61;
        padding-right: 10px;
        cursor: pointer;
    }

    #filter .values li {
        font-size: 8pt;
        color: #5c5c61;
        padding-right: 10px;
        line-height: 25px;
        cursor: pointer;
    }

    #filter .values .horizental-line {
        height: 1px;
        width: 90%;
        background-color: #cecfce;
        margin: 2px auto 8px auto;
    }

    .square, .select, .hover {
        width: 9px;
        height: 9px;
        display: inline-block;
        background: url(/images/spritefiltercontrols.png);
        position: relative;
        top: 1px;
        margin-left: 3px;
    }

    .square {
        background-position: -59px -154px;
    }

    .hover {
        background-position: -59px -205px !important;
    }

    .select {
        background-position: -59px -256px !important;
    }

</style>

<div id="filters-selected"></div>

<ul id="filter">
    @foreach($attributes as $attribute)
        <li>
            <p class="title">
                {{ $attribute->title }}
                <span></span>
            </p>

            <div class="values">
                <ul>
                    <p class="" onclick="showAllAttributes(this); doSearch();">
                        <span class="select"></span>
                        نمایش همه
                    </p>
                    <div class="horizental-line"></div>
                    @foreach($attribute->values as $value)
                        <li title="bita" data-id="{{ $value->id }}" data-attr-id="{{ $attribute->id }}">
                            <span class="square"></span>
                            {{ $value->value }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
    @endforeach
</ul>

<script>

    /*Filter values*/

    var filter = $('#filter');
    var filters = filter.find('li');
    var values = filter.find('.values li');
    var showAll = filter.find('.values p');
    var removeIcon = filter.find('.remove-filter');

    filters.hover(function () {

        $(this).addClass('active');
        $('.values', this).fadeIn(0);
    }, function () {

        $(this).removeClass('active');
        $('.values', this).fadeOut(0);
    });

    values.hover(function () {

        $('.square', this).addClass('hover');
    }, function () {

        $('.square', this).removeClass('hover');
    });

    values.click(function () {

        var title = $(this).parents('li').find('.title').text();
        var value = $(this).text();
        var id = $(this).attr('data-id');
        var attrID = $(this).attr('data-attr-id');

        var filtersSelected = $('#filters-selected');
        var filterBox = '<span class="filter-show" data-attr-id="' + attrID + '" data-id="' + id + '">' + title + ' : ' + value + '<i class="remove-filter" onclick="removeSelected(this)"></i><input type="hidden" name="attr-' + attrID + '[]" value="' + id + '"></span>';
        var filterBoxSame = filtersSelected.find('.filter-show[data-id = ' + id + ']');
        var filterBoxSameLen = filterBoxSame.length;

        if (filterBoxSameLen > 0) {
            filterBoxSame.remove();

        } else {
            filtersSelected.append(filterBox);
        }

        $('.square', this).toggleClass('select');
        $(this).parents('.values').find('p').find('span.select').removeClass('select').addClass('square');

        doSearch();
    });

    showAll.hover(function () {

        $('.square', this).addClass('hover');
    }, function () {

        $('.square', this).removeClass('hover');
    });

    function showAllAttributes(tag) {
        var selectedIDs = $(tag).parent('ul').find('li').attr('data-attr-id');
        $('#filters-selected').find('.filter-show[data-attr-id = ' + selectedIDs + ']').remove();
        $('.square', this).addClass('select');
        $(tag).find('span').addClass('select');
        $(tag).parents('.values').find('li').find('span.select').removeClass('select').addClass('square');
    }

    function removeSelected(tag) {

        var filterBox = $(tag).parents('span');
        var id = filterBox.attr('data-id');
        filterBox.remove();
        $('.values li[data-id = ' + id + ']').find('.square').removeClass('select');

        doSearch();
    }

</script>
