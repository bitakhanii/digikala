<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show-users')->only('index');
        $this->middleware('can:create-user')->only(['create', 'store']);
        //$this->middleware('can:details-user')->only('edit');
        //$this->middleware('can:edit-user')->only('update');
        $this->middleware('can:delete-user')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index()
    {
        $query = User::query();
        $keyword = request('user_search');

        if ($keyword) {
            $query = $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('email', 'LIKE', "%{$keyword}%");
        }
        $users = $query->latest()->paginate('15', ['id', 'name', 'email', 'email_verified_at', 'created_at']);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->userValidate($request);

        User::query()->create($data);

        alert()->success('حله!', 'کاربر با موفقیت ایجاد شد.');
        return redirect(route('admin.user.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('details-user', $user);
        return view('admin.user.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('details-user', $user);
        $data = $this->userValidate($request, $user);
        $user->update($data);

        alert()->success('حله!', 'کاربر با موفقیت ویرایش شد.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        alert()->success('حله!', 'کاربر با موفقیت حذف شد.');
        return redirect(route('admin.user.index'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function userValidate(Request $request, $user = ''): array
    {
        $data = $request->validate([
            'first_name' => ['required', 'min:3', 'max:50'],
            'last_name' => ['required', 'min:3', 'max:100'],
            'mobile' => ['nullable',
                function ($attribute, $value, $fail) {
                    $mobile = persianToEng($value);
                    if (!preg_match('/^09(1[0-9]|9[0-4]|3[0|3|5-9]|0[0-5]|2[0-2])-?[0-9]{3}-?[0-9]{4}$/', $mobile)) {
                        $fail('شماره موبایل وارد شده نامعتبر می‌باشد.');
                    }
                }],
            'email' => ['required', 'regex:/(.+)@(.+)\.(.+)/i'],
            'email_verify' => ['nullable', Rule::in([0, 1])],
        ]);

        $data['name'] = $data['first_name'] . '-' . $data['last_name'];
        $data['mobile'] = $request->mobile ? persianToEng($data['mobile']) : NULL;
        $data['email'] = persianToEng($data['email']);

        if ($user) {
            $data['password'] = $user->password;
            if (in_array('email_verify', array_keys($data))) {
                if ($user->email_verified_at && $data['email_verify'] == 1) {
                    $data['email_verified_at'] = $user->email_verified_at;
                } else {
                    $data['email_verified_at'] = $data['email_verify'] == 1 ? now() : NULL;
                }
            }
        } else {
            $data['password'] = Str::random();
            if (in_array('email_verify', array_keys($data))) {
                $data['email_verified_at'] = $data['email_verify'] == 1 ? now() : NULL;
            }
        }

        unset($data['email_verify'], $data['first_name'], $data['last_name']);
        return $data;
    }
}
