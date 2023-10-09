<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Favorite;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Morilog\Jalali\CalendarUtils;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function index(Request $request)
    {
        $profileClass = new Profile;
        if (!isset($_GET['activeTab'])) {
            $activeTab = 'orders';
        } else {
            $activeTab = $_GET['activeTab'];
        }
        return view('profile.index', [
            'user' => $request->user(),
            'activeTab' => $activeTab,
            'ordersCount' => Profile::ordersCount(),
            'commentsCount' => count(auth()->user()->comments),
            'unreadMessages' => count(auth()->user()->messages()->where('status', 0)->get()),
            'messages' => $profileClass->messageUpdate(),
            'orders' => auth()->user()->orders()->orderBy('id', 'desc')->get(),
            'folders' => auth()->user()->favorites()->where('title', '!=', NULL)->orderBy('id', 'desc')->get(),
            'comments' => auth()->user()->comments()->orderBy('id', 'desc')->get(),
            'digibons' => auth()->user()->discounts()->where('register', 1)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Edit the user's information
     */

    public function edit(User $user)
    {
        return view('profile.user-info', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, User $user)
    {
        $mobile = persianToEng($request->mobile);
        $mobileRegex = preg_match('/^09(1[0-9]|9[0-4]|3[0|3|5-9]|0[0-5]|2[0-2])-?[0-9]{3}-?[0-9]{4}$/', $mobile);
        if ($mobileRegex || $mobile == '') {
            $thisYear = jdate()->format('Y');
            $twoYearsAgo = $thisYear - 2;
            $data = $request->validate([
                'email' => ['required', 'regex:/(.+)@(.+)\.(.+)/i',],
                'first_name' => ['required', 'min:3', 'max:255'],
                'last_name' => ['nullable', 'min:3', 'max:255'],
                'mobile' => ['nullable',],
                'birth_day' => ['required', 'numeric', 'between:1,31',],
                'birth_month' => ['required', 'numeric', 'between:1,12',],
                'birth_year' => ['required', 'numeric', 'between:1300,' . $twoYearsAgo,],
                'sex' => ['nullable', 'in:female,male',],
                'area_code' => ['nullable', 'min:3', 'max:4', 'starts_with:0,۰', 'persian_numbers',],
                'phone' => ['nullable', 'min:7', 'max:8', 'persian_numbers', 'doesnt_start_with:0,۰',],
                'address' => ['nullable', 'max:500',],
                'national_code' => ['nullable', 'persian_numbers', 'size:10',],
                'credit_card' => ['nullable', 'size:16', 'persian_numbers',],
                'newsletter' => ['required', 'in:0,1',],
            ], ['birth_month' => 'ماه تولد انتخاب شده، معتبر نیست.', 'birth_year' => 'سال تولد انتخاب شده، معتبر نیست.', 'area_code' => 'کد منطقه وارد شده، معتبر نیست.', 'phone' => 'شماره ثابت وارد شده، معتبر نیست.', 'national_code' => 'کدملی وارد شده، معتبر نیست.', 'credit_card' => 'شماره کارت وارد شده، معتبر نیست.']);

            $data['name'] = $data['first_name'] . '-' . $data['last_name'];
            $gregorianDate = CalendarUtils::toGregorian($data['birth_year'], $data['birth_month'], $data['birth_day']);
            $data['dob'] = $gregorianDate[0] . '-' . $gregorianDate[1] . '-' . $gregorianDate[2];
            $data['mobile'] = persianToEng($data['mobile']);
            $data['area_code'] = persianToEng($data['area_code']);
            $data['phone'] = persianToEng($data['phone']);
            $data['national_code'] = persianToEng($data['national_code']);
            $data['credit_card'] = persianToEng($data['credit_card']);

            unset($data['first_name'], $data['last_name'], $data['birth_day'], $data['birth_month'], $data['birth_year']);

            if ($request->email != $user->email) {
                $data['email_verified_at'] = null;
            }

            $user->update($data);
            alert()->success('موفقیت آمیز', 'اطلاعات شما با موفقیت ثبت شد.')->showConfirmButton('حله', '#5b78c4');
            return redirect(route('profile'));

        } else {
            toast('شماره همراه وارد شده، نامعتبر است.', 'error');
            return back();
        }
    }

    public function password(User $user)
    {
        return view('profile.change-password', ['user' => $user]);
    }

    function showFavorites($folderID)
    {
        $profile = new Profile;
        return $profile->showFavorites($folderID);
    }

    function changeFolderName($folderID, Request $request)
    {
        if ($request['title'] == '') {
            return 'نام پوشه را وارد کنید';
        } else {
            $favorites = Favorite::query();
            $favorites->find($folderID)->update(['title' => $request['title']]);
            return '';
        }
    }

    function deleteFavorite(Favorite $favorite)
    {
        if ($favorite->parent == 0) {
            Favorite::query()->where('parent', $favorite->id)->delete();
            $favorite->delete();
            return 'folder';
        } else {
            $favorite->delete();
            return '';
        }
    }

    function updateDigibon(Request $request)
    {
        $codeStatus = registerCode($request);

        if ($codeStatus == 'correct') {
            alert()->success('', 'دیجی‌بن شما با موفقیت ثبت شد.')->showConfirmButton('حله');
        }
        if ($codeStatus == 'exists') {
            alert()->info('', 'این دیجی‌بن را قبلا ثبت کرده‌اید.');
        }
        if ($codeStatus == 'not yours') {
            alert()->warning('', 'این دیجی‌بن متعلق به شما نمی‌باشد!');
        }
        if ($codeStatus == 'incorrect') {
            alert()->warning('', 'دیجی‌بن وارد شده نامعتبر می‌باشد!');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
