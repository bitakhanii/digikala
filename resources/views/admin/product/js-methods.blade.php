<script>
    function loadSubCategory(level) {

        var select = $('select[name="category-' + level + '"]');
        var categoryID = select.val();
        var categoryTag = $('.category-select');
        var brandTag = $('.brand-select');
        var brandSelect = brandTag.find('select');

        var changeBtn = '<button type="button" class="btn btn-sm btn-secondary change-cat" onclick="resetCategory();">تغییر دسته‌بندی</button>';
        var categoryInput = '<input type="hidden" name="category_id" value="">';
        var makeBrand = '<button type="button" class="btn btn-sm btn-secondary" onclick="showBrandModal();">برند جدید بسازید</button>';

        $.ajax({
            type: 'POST',
            url: '/admin/product/sub-category/' + categoryID,
            data: {},
            success: function (msg) {
                if (msg[0].length !== 0) {
                    var options = '';
                    $.each(msg[0], function (index, value) {
                        options += '<option value="' + value['id'] + '">' + value['title'] + '</option>';
                    })
                    var selectTag = '<div class="form-group"><label class="ml-4">دسته‌بندی سطح ' + (level + 1) + '*</label><select class="form-control select-2 col-4" name="category-' + (level + 1) + '" onchange="loadSubCategory(' + (level + 1) + ');"><option value="">انتخاب کنید</option>' + options + '</select></div>';

                    if (level === 1) {
                        categoryTag.find('.form-group:first-child').append(changeBtn);
                    }

                    categoryTag.append(selectTag);

                    select.attr('disabled', 'disabled');

                    $('.select-2').select2({placeholder: 'انتخاب کنید'});

                    brandSelect.attr('disabled', 'disabled');
                    brandSelect.find('option:not(:first)').remove();
                    brandSelect.val(null).trigger('change');
                    brandTag.find('button').remove();

                    $('#attribute-select').children().remove();
                }

                if (msg[0].length === 0) {

                    select.attr('disabled', 'disabled');

                    //categoryTag.find('select').removeAttr('id');
                    categoryTag.append(categoryInput);
                    var catVal = $('select[name="category-' + level + '"]').find('option:selected');
                    categoryTag.find('input[name=category_id]').attr('value', catVal.val());
                    categoryTag.find('input[name=category_id]').text(catVal.text());

                    brandTag.find('.form-group').append(makeBrand);

                    var brandOptions = '';
                    $.each(msg[1], function (index, brand) {
                        brandOptions += '<option value="' + brand['id'] + '">' + brand['name'] + '</option>';
                    });
                    brandTag.find('select').html('<option value="0">no brand</option>' + brandOptions);
                    brandTag.find('select').removeAttr('disabled');

                    if (msg[2].length !== 0) {

                        var attributes = '';
                        $.each(msg[2], function (index, attribute) {

                            var values = '';
                            $.each(attribute['values'], function (index, value) {
                                values += '<option value="' + value['id'] + '">' + value['value'] + '</option>';
                            });

                            attributes += '<div class="form-group"><label class="ml-4 col-2 attr-label">' + attribute['title'] + '</label><select class="value-select col-3" name="attribute-' + attribute['id'] + '"><option value="">انتخاب کنید</option>' + values + '</select></div>';
                        })

                        var attributeTag = '<label>ویژگی‌ها</label><div class="form-group">' + attributes + '</div>';

                        $('#attribute-select').html(attributeTag);
                    }

                    $('.value-select').select2({
                        placeholder: 'انتخاب کنید',
                        tags: true,
                    });
                }
            }
        });
    }

    function resetCategory() {

        var cat = $('.category-select');
        var catSelect = cat.find('select');
        var brand = $('.brand-select');
        var brandSelect = brand.find('select');

        cat.find('.form-group:not(:first)').remove();
        catSelect.removeAttr('disabled');
        cat.find('.change-cat').remove();
        cat.find('input[name=category_id]').remove();
        cat.find('option:first').attr('selected', 'selected');
        catSelect.val(null).trigger('change');

        brandSelect.attr('disabled', 'disabled');
        brandSelect.find('option:not(:first)').remove();
        brandSelect.val(null).trigger('change');
        brand.find('button').remove();

        $('#attribute-select').find('.form-group').remove();
    }

    function showBrandModal() {
        var selectedCategory = $('.category-select').find('input[name="category_id"]');
        var text = selectedCategory.text();
        if (text === '') {
            text = '{{ @$product->category->title }}';
        }
        var id = selectedCategory.val();

        var createBrand = $('#create-brand');
        createBrand.find('h5').text('برند جدید برای دسته‌ی ' + text);
        createBrand.find('input[name=category_id]').attr('value', id);
        createBrand.modal('show');
    }

    function createBrand() {
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.create.brand') }}',
            data: $('#create-brand').find('form').serializeArray(),
            success: function (msg) {
                if (msg[0] === 'error') {
                    Swal.fire({
                        icon: 'error',
                        text: msg[1]['name'][0],
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                if (msg[0] === 'success') {
                    $('#create-brand').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        text: msg[1],
                        showConfirmButton: false,
                        timer: 1500
                    })

                    var brandOptions = '';
                    console.log(msg[2]);
                    $.each(msg[2], function (index, brand) {
                        brandOptions += '<option value="' + brand['id'] + '">' + brand['name'] + '</option>';
                    });
                    $('.brand-select').find('select').html('<option value="0">no brand</option>' + brandOptions);
                }
            }
        });
    }

    $('.select-2').select2({
        placeholder: 'انتخاب کنید',
    });

    $('.value-select').select2({
        placeholder: 'انتخاب کنید',
        tags: true,
    });

    CKEDITOR.replace('introduction', {

        language: 'en',
        filebrowserUploadUrl: '{{ route("editor-upload", ["_token" => csrf_token()]) }}',
        filebrowserUploadMethod: 'form'
    })

    var ids = ['price', 'inventory', 'weight', 'discount'];
    $.each(ids, function (index, id) {
        var myInput = document.getElementById(id);
        myInput.addEventListener("input", function () {
            formatNumber(myInput);
        });
    })

    function formatOption(option) {
        if (!option.id) {
            return option.text;
        }

        // دسترسی به مقدار data-hex
        var colorHex = option.element.getAttribute('data-hex');

        // ایجاد span رنگ
        var colorSpan = '<span class="color-span" style="background-color:' + colorHex + '"></span>';

        // ایجاد HTML آپشن با span رنگ
        var formattedOption = '<div>' + colorSpan + option.text + '</div>';

        return $(formattedOption);
    }

    $('.select3').select2({
        templateResult: formatOption,
        templateSelection: formatOption
    });

    const pickr = Pickr.create({
        el: '.color-picker',
        theme: 'nano', // 'classic' or 'monolith', or 'nano'
        lockOpacity: true,
        useAsButton: true,
        position: 'bottom-end',

        swatches: [
            'rgb(244, 67, 54)',
            'rgb(233, 30, 99)',
            'rgb(156, 39, 176)',
            'rgb(103, 58, 183)',
            'rgb(63, 81, 181)',
            'rgb(33, 150, 243)',
            'rgb(3, 169, 244)',
            'rgb(0, 188, 212)',
            'rgb(0, 150, 136)',
            'rgb(76, 175, 80)',
            'rgb(139, 195, 74)',
            'rgb(205, 220, 57)',
            'rgb(255, 235, 59)',
            'rgb(255, 193, 7)'
        ],

        components: {

            // Main components
            preview: true,
            opacity: false,
            hue: true,

            // Input / output Options
            interaction: {
                hex: true,
                rgba: true,
                hsla: false,
                hsva: false,
                cmyk: false,
                input: true,
                clear: false,
                save: true
            }
        },

        i18n: {
            'btn:save': 'ذخیره',
        }
    });

    pickr.on('save', function (color, instance) {
        var hex = color.toHEXA().toString().substr(1);
        $('input[name=hex]').val(hex);

        $('.color-name').slideDown(400);
        $('.register').fadeIn(100);
        pickr.hide();
    });

    function createColor() {
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.create.color') }}',
            data: $('#create-color').find('form').serializeArray(),
            success: function (msg) {
                if (msg[0] === 'error') {

                    var errorMsg = '';

                    if (msg[1].hasOwnProperty('hex')) {
                        errorMsg += msg[1]['hex'][0];
                    } else {
                        errorMsg += msg[1]['name'][0];
                    }

                    Swal.fire({
                        icon: 'error',
                        text: errorMsg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }

                if (msg[0] === 'success') {
                    $('#create-color').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        text: 'رنگ مورد نظر ایجاد شد.',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    var colorOptions = '<option value="' + msg[1]['id'] + '" data-hex="' + msg[1]['hex'] + '">' + msg[1]['name'] + '</option>';
                    $('#color-select').find('select').append(colorOptions);
                }
            }
        });
    }
</script>
