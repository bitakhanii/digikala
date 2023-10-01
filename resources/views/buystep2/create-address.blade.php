<div class="modal fade" id="create-address">
    <div class="modal-dialog">

        <form action="{{ route('addresses.store') }}" method="post">
            @csrf

            <div class="address-window">

                <h4>
                    افزودن آدرس جدید
                    <i class="close-modal" data-dismiss="modal"></i>
                </h4>

                <div class="row">
                    <p>
                        نام تحویل گیرنده
                    </p>
                    <input type="text" id="first-name" class="@error('first_name') is-invalid @enderror" name="first_name"
                           value="{{ old('first_name') }}">
                    <x-input-error :messages="$errors->get('first_name')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        نام خانوادگی تحویل گیرنده
                    </p>
                    <input type="text" id="last-name" class="@error('last_name') is-invalid @enderror" name="last_name"
                           value="{{ old('last_name') }}">
                    <x-input-error :messages="$errors->get('last_name')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        شماره تماس ضروری (تلفن همراه)
                    </p>
                    <input type="text" id="mobile" class="@error('mobile') is-invalid @enderror" placeholder="۰۹..."
                           name="mobile" value="{{ old('mobile') }}">
                    <x-input-error :messages="$errors->get('mobile')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        شماره تلفن ثابت تحویل گیرنده
                    </p>

                    <input type="text" id="phone" class="phone @error('phone') is-invalid @enderror" name="phone"
                           value="{{ old('phone') }}">
                    <input id="area-code" class="area-code @error('area_code') is-invalid @enderror"
                           placeholder="۰۲۱" name="area_code" value="{{ old('area_code') }}">
                    <x-input-error :messages="$errors->get('area_code')" class="error"/>
                    <x-input-error :messages="$errors->get('phone')" class="error"/>
                </div>

                <div class="row">
                    <p>
                        استان/شهر تحویل گیرنده
                    </p>

                    <select id="state" class="selectpicker state" title="انتخاب کنید" name="state" onchange="loadCity(this, 'state-name', 'city');">
                        <option></option>
                    </select>

                    <span class="city">
                               <select id="city" class="selectpicker city" title="انتخاب کنید" name="city">
                                  <option>  </option>
                               </select>
                            </span>

                    <input type="hidden" value="" id="state-name" name="state_name">
                    <input type="hidden" value="" id="city-name" name="city_name">

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
                    <input type="text" id="zip-code" class="@error('postal_code') is-invalid @enderror" name="postal_code"
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

    var createAddress = $('#create-address');

    /*Get address errors from Laravel and if error exists, Show the modal window again with errors*/
    var addressErrors = {!! json_encode(session('address_errors')) !!};
    if (addressErrors) {
        createAddress.modal('show');
    }


    /*Frotel State and City Choose*/
    loadOstan('state');


    /*Set City text in hidden input*/
    $('#city').change(function () {
        var text = $(this).find('option:selected').text();
        $('#city-name').attr('value', text);
    });


    /*Show the Modal Window*/
    createAddress.on('shown.bs.modal', function () {
        $('input[type=text]').val('');
        $('textarea').val('');
    })

</script>
