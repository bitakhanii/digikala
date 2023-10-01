// how to make an input just type persian or english
// how to make an input just type persian numbers or english numbers



$(document).on( 'keydown' , '.numeric' ,function (e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        (e.keyCode == 65 && e.ctrlKey === true) ||
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});  // just type numbers (persian and english)




$(document).on( 'keydown' , '.farsiNum' ,function (e) {
    console.log(e.key);
    if(e.key == 'Alt' || e.key == 'Shift' || e.key == 'Tab' || e.key == 'Backspace')
        return ;

    if( !e.key.match(/^[۰-۹]+$/)){
        e.preventDefault();
    }
}); // just type persian numbers




$(document).on( 'keydown' , '.englishNum' ,function (e) {
    console.log(e.key);
    if(e.key == 'Alt' || e.key == 'Shift' || e.key == 'Tab' || e.key == 'Backspace')
        return ;

    if( !e.key.match(/^[0-9]+$/)){
        e.preventDefault();
    }
}); // just type english numbers




$(document).on( 'keydown' , '.farsi' ,function (e) {
    console.log(e.key);
    if(e.key == 'Alt' || e.key == 'Shift' || e.key == 'Tab' || e.key == 'Backspace')
        return ;

    if( !e.key.match(/^[۰-۹ ا آ ئ ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]+$/)){
        e.preventDefault();
    }
}); // just type persian (letters and numbers)




$(document).on( 'keydown' , '.engelish' ,function (e) {
    console.log(e.key);
    if(e.key == 'Alt' || e.key == 'Shift' || e.key == 'Tab' )
        return ;

    if( !e.key.match(/^[0-9 a-z A-Z]+$/)){
        e.preventDefault();
    }
}); // just type english (letters and numbers)