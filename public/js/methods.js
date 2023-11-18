/* Make english numbers to persian Example for input tags when it has an old value */
function replaceDigits(input) {
    var map = {
        '0': '۰',
        '1': '۱',
        '2': '۲',
        '3': '۳',
        '4': '۴',
        '5': '۵',
        '6': '۶',
        '7': '۷',
        '8': '۸',
        '9': '۹'
    };
    return input.replace(/\d/g, function (match) {
        return map[match];
    });
}


/*Add Commas to prices*/
function itpro(Number) {
    Number += '';
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y = y.replace(rgx, '$1' + ',' + '$2');
    return y + z;
}

function propertySlider(sliderID, score, disable) {
    $('#' + sliderID).ionRangeSlider({
        skin: 'square',
        min: 1,
        max: 5,
        hide_min_max: true,
        from: score,
        disable: disable,
        onChange: function () {
            $('.irs-single').persiaNumber();
        },
    });
}

function formatNumber(input) {
    var num = input.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    input.value = num;
}
