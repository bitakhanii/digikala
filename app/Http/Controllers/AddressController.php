<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (auth()->user()->addresses()->exists()) {
            $selectedAddress = session()->has('order.addressID') ? session()->get('order.addressID') : auth()->user()->addresses()->orderBy('id', 'desc')->first()->id;
        } else {
            $selectedAddress = null;
        }

        $addresses = auth()->user()->addresses()->latest()->get();

        $selectedOption = session()->has('order.factor') ? session()->get('order.factor') : 0;

        return view('buystep2.index', compact(['selectedAddress', 'addresses', 'selectedOption']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        list($validator, $data) = $this->validateAddress($request);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $request->session()->flash('address_errors', $errors);
            return redirect()->back()->withErrors($errors->messages())->withInput();
        } else {
            $user = auth()->user();
            $user->addresses()->create($data);
            alert()->success('موفقیت آمیز', 'آدرس جدید با موفقیت ثبت شد.')->showConfirmButton('حله', '#5b78c4');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        return json_encode($address);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        list($validator, $data) = $this->validateAddress($request);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $request->session()->flash('edit_address_errors', $errors);
            $request->session()->flash('address_id', $address->id);
            return redirect()->back()->withErrors($errors->messages())->withInput();
        } else {
            $address->update($data);
            alert()->success('موفقیت آمیز', 'آدرس شما با موفقیت تغییر کرد.')->showConfirmButton('حله', '#5b78c4');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return back();
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function validateAddress(Request $request): array
    {
        $rules = [
            'first_name' => ['required', 'min:3', 'max:50'],
            'last_name' => ['required', 'min:3', 'max:100'],
            'mobile' => ['required',
                function ($attribute, $value, $fail) {
                    $mobile = persianToEng($value);
                    if (!preg_match('/^09(1[0-9]|9[0-4]|3[0|3|5-9]|0[0-5]|2[0-2])-?[0-9]{3}-?[0-9]{4}$/', $mobile)) {
                        $fail('شماره موبایل وارد شده نامعتبر می‌باشد.');
                    }
                }],
            'area_code' => ['nullable', 'min:3', 'max:4', 'starts_with:0,۰', 'persian_numbers', 'required_with:phone'],
            'phone' => ['nullable', 'min:7', 'max:8', 'persian_numbers', 'doesnt_start_with:0,۰', 'required_with:area_code'],
            'state' => ['required'],
            'city' => ['required'],
            'state_name' => ['required'],
            'city_name' => ['required'],
            'address' => ['required', 'min:5'],
            'postal_code' => ['required',],
        ];

        $validator = Validator::make($request->toArray(), $rules);

        $data = $validator->getData();

        $data['mobile'] = persianToEng($data['mobile']);
        $data['area_code'] = persianToEng($data['area_code']);
        $data['phone'] = persianToEng($data['phone']);
        $data['postal_code'] = persianToEng($data['postal_code']);
        $data['name'] = $data['first_name'] . '-' . $data['last_name'];

        unset($data['first_name'], $data['last_name']);
        return array($validator, $data);
    }
}
