@component('admin.layouts.content')

    <style>
        label {
            font-weight: 400 !important;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <!--.card-header -->
                <div class="card-header">
                    <h3 class="card-title">
                        @if(isset($user))
                            ویرایش کاربر "{{ $user->first_name.' '. $user->last_name }}"
                        @else
                            ایجاد یک کاربر جدید
                        @endif
                    </h3>
                </div>
                <!-- /.card-header -->

                <!--.card-body -->
                <div class="card-body">
                    @can('delete-user')
                        @if(isset($user))
                            <form id="delete-user" class="float-left"
                                  action="{{ route('admin.user.destroy', $user->id) }}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-md btn-danger delete-user">حذف کاربر</button>
                            </form>
                        @endif
                    @endcan

                    <form
                        action="@if(isset($user)) {{ route('admin.user.update', $user->id) }} @else {{ route('admin.user.store') }} @endif"
                        method="post">
                        @csrf
                        @if(isset($user))
                            @method('PATCH')
                        @endif
                        <div class="form-group">
                            <label>نام</label>
                            <input type="text" class="form-control col-5" name="first_name"
                                   value="{{ old('first_name', @$user->first_name) }}">
                            <x-input-error :messages="$errors->get('first_name')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>نام خانوادگی</label>
                            <input type="text" class="form-control col-5" name="last_name"
                                   value="{{ old('last_name', @$user->last_name) }}">
                            <x-input-error :messages="$errors->get('last_name')" class="error"/>
                        </div>

                        <div class="form-group">
                            <label>ایمیل</label>
                            <input type="text" class="form-control col-5" name="email"
                                   value="{{ old('email', @$user->email) }}">
                            <x-input-error :messages="$errors->get('email')" class="error"/>
                        </div>

                        @can('verify-user')
                            <div class="form-group">
                                <label>وضعیت ایمیل</label>
                                <div class="form-check-inline">
                                    <input class="form-check-input ml-1" type="radio" name="email_verify" value="1"
                                           @if(isset($user))
                                               @if($user->email_verified_at) checked @endif
                                        @endif>
                                    <label class="form-check-label ml-4">تأیید شده</label>
                                    <input class="form-check-input ml-1" type="radio" name="email_verify"
                                           value="0" @if(isset($user))
                                               @if(!$user->email_verified_at) checked @endif
                                        @endif>
                                    <label class="form-check-label">تأیید نشده</label>
                                </div>

                                <x-input-error :messages="$errors->get('email_verify')" class="error"/>
                            </div>
                        @endcan

                        <div class="form-group">
                            <label>شماره همراه</label>
                            <input type="text" class="form-control col-5" name="mobile"
                                   value="{{ old('mobile', @$user->mobile) }}">
                            <x-input-error :messages="$errors->get('mobile')" class="error"/>
                        </div>

                        <div class="form-group text-center mt-4">
                            @if(isset($user))
                                @can('edit-user', $user)
                                    <button type="submit" class="btn btn-md btn-warning col-2">
                                        ویرایش کاربر
                                    </button>
                                @endcan
                            @else
                                <button type="submit" class="btn btn-md btn-warning col-2">
                                    ثبت کاربر
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>


    <script>
        $(document).on('click', '.delete-user', function () {

            Swal.fire({
                title: 'مطمئنید؟',
                text: "این کاربر برای همیشه حذف خواهد شد!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-user').submit();
                }
            })
        });
    </script>

@endcomponent
