<div class="modal fade" id="edit-address">
    <div class="modal-dialog">

        <form action="" method="post">
            @csrf
            @method('PATCH')

            <div class="address-window">

                <h4>
                    ویرایش آدرس
                    <i class="close-modal" data-dismiss="modal"></i>
                </h4>

                <div class="row">
                    <p>
                        نام تحویل گیرنده
                    </p>
                    <input type="text" id="edit-first-name" class="@error('first_name') is-invalid @enderror" name="first_name"
                           value="{{ old('first_name') }}">
                    <x-input-error :messages="$errors->get('first_name')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        نام خانوادگی تحویل گیرنده
                    </p>
                    <input type="text" id="edit-last-name" class="@error('last_name') is-invalid @enderror" name="last_name"
                           value="{{ old('last_name') }}">
                    <x-input-error :messages="$errors->get('last_name')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        شماره تماس ضروری (تلفن همراه)
                    </p>
                    <input type="text" id="edit-mobile" class="@error('mobile') is-invalid @enderror" placeholder="۰۹..."
                           name="mobile" value="{{ old('mobile') }}">
                    <x-input-error :messages="$errors->get('mobile')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        شماره تلفن ثابت تحویل گیرنده
                    </p>

                    <input type="text" id="edit-phone" class="phone @error('phone') is-invalid @enderror" name="phone"
                           value="{{ old('phone') }}">
                    <input id="edit-area-code" class="area-code @error('area_code') is-invalid @enderror"
                           placeholder="۰۲۱" name="area_code" value="{{ old('area_code') }}">
                    <x-input-error :messages="$errors->get('area_code')" class="error"/>
                    <x-input-error :messages="$errors->get('phone')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        استان/شهر تحویل گیرنده
                    </p>

                    <select id="edit-state" class="selectpicker state" title="انتخاب کنید" name="state" onchange="loadCity(this, 'edit-state-name', 'edit-city')">
                        <option></option>
                    </select>

                    <span class="city">
                                <select id="edit-city" class="selectpicker city" title="انتخاب کنید" name="city">
                                   <option>  </option>
                                </select>
                             </span>

                    <input type="hidden" value="" id="edit-state-name" name="state_name">
                    <input type="hidden" value="" id="edit-city-name" name="city_name">

                    <x-input-error :messages="$errors->get('state')" class="error"/>
                    <x-input-error :messages="$errors->get('city')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        آدرس پستی
                    </p>

                    <textarea name="address"
                              placeholder="ادامه آدرس خود را وارد نمایید...">{{ old('address') }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        کد پستی
                    </p>
                    <input type="text" id="edit-zip-code" class="@error('postal_code') is-invalid @enderror" name="postal_code"
                           value="{{ old('postal_code') }}">
                    <x-input-error :messages="$errors->get('postal_code')" class="error"/>
                </div>

                <div class="row">
                    <button class="blue-btn">
                        ثبت اطلاعات و بازگشت
                    </button>

                    <button class="gray-btn" style="float: right;" data-dismiss="modal">
                        بازگشت
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

<script>

    var editAddressWindow = $('#edit-address');

    /*Get address errors from Laravel and if error exists, Show the modal window again with errors*/
    var editAddressErrors = {!! json_encode(session('edit_address_errors')) !!};
    if (editAddressErrors) {
        editAddressWindow.modal('show');
        editAddressWindow.find('form').attr('action', 'addresses/' + '{!! json_encode(session('address_id')) !!}');
    }

    function editAddress(addressID) {

        var url = 'addresses/' + addressID + '/edit';
        var data = {};

        $.get(url, data, function (msg) {

            var name = msg['name'].split('-');
            var editModal = $('#edit-address');

            editModal.find('input[name = first_name]').val(replaceDigits(name[0]));
            editModal.find('input[name = last_name]').val(replaceDigits(name[1]));
            editModal.find('input[name = mobile]').val(replaceDigits(msg['mobile']));
            if (msg['phone'] !== null) {
                editModal.find('input[name = area_code]').val(replaceDigits(msg['area_code']));
                $('input[name = phone]').val(replaceDigits(msg['phone']));
            }
            $('textarea[name = address]').val(replaceDigits(msg['address']));

            $('input[name = postal_code]').val(replaceDigits(msg['postal_code']));

            editAddressWindow.modal('show');

        }, 'json');
    }


    /*Frotel State and City Choose*/
    loadOstan('edit-state');


    /*Set City text in hidden input*/
    $('#edit-city').change(function () {
        var text = $(this).find('option:selected').text();
        $('#edit-city-name').attr('value', text);
    });

</script>
