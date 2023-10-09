@component('admin.layouts.content')

    <style>
        tr:first-child td {
            font-family: yekan-exbold;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول کاربران</h3>

                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-info btn-sm">ایجاد کاربر جدید</a>
                        </div>

                        <form action="">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="user_search" class="form-control float-right"
                                       placeholder="جستجو" value="{{ request()->user_search }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>نام و نام‌خانوادگی</td>
                            <td>تاریخ عضویت</td>
                            <td>ایمیل</td>
                            <td>وضعیت ایمیل</td>
                            <td>عملیات‌ها</td>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name . ' ' . $user->last_name }}
                                    @if(\Carbon\Carbon::parse($user->created_at)->addDay() > now())
                                        <span class="badge badge-primary">جدید</span>
                                    @endif
                                </td>
                                <td>{{ jdate($user->created_at)->format('%Y-%m-%d') }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->email_verified_at)
                                        <span class="badge badge-success">تأیید شده</span>
                                    @else
                                        <span class="badge bg-danger">تأیید نشده</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('admin.user.edit', $user->id) }}">جزئیات و ویرایش</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    @include('admin.layouts.pagination', ['users' => $users])
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent
