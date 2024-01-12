@extends('layouts.admin')

@section('content')
    <style>
        .user_label {
            margin: 0;
            padding: 15px;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            background: #d6227d;
        }

        .user_label > i {
            color: #fff;
        }

        .user_label > span {
            color: #fff;
            font-size: 20px;
            font-family: times, yekan;
        }
        .edit_user{}
        .edit_user > p{
            margin: 0;
            padding: 10px 0;
            font-weight: 600;
        }
        .edit_user > p > i{
            margin-right: 5px;
        }
        .edit_user > input{}
        .edit_user > select{}
        .edit_user > select > option{}
    </style>


    <div class="container" style="background: #fff;box-shadow: 0px 3px 10px 0px #00000040;padding: 0;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6">
                <p class="user_label">
                    <i class="fa fa-user"></i>
                    edit user :
                    <span>{{ $user->name }} </span>
                </p>
            </div>
        </div>
    </div>



    <div class="container" style="background: #fff;box-shadow: 0px 3px 10px 0px #00000040;padding: 0;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <hr>
                    <p  style="margin: 0;padding: 10px 0;font-weight: 600;">change password:</p>
                    <form action="{{ url('/admin/user/update/password/') .'/'. $user->id }}" method="post">
                        <p style="margin: 0;padding: 10px 0;font-weight: 600;">new password:</p>
                        <input class="form-control" type="text" name="password" required>
                        <p style="margin: 0;padding: 10px 0;font-weight: 600;">repeat password:</p>
                        <input class="form-control" type="text" name="password_confirmation" required>
                        <br>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-secondary">update password</button>
                    </form>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <form action="{{ url('/admin/user/update/') .'/'. $user->id }}" method="post" class="col-md-12 edit">

                        <p><i class="fa fa-pencil"></i>نام کاربری:</p>
                        <input class="form-control" type="text" name="name" value="{{ $user->name }}"
                               placeholder="name">
                        <p><i class="fa fa-envelope"></i>ایمیل:</p>
                        <input class="form-control" type="text" name="email" value="{{ $user->email }}"
                               placeholder="email">

                        <p><i class="fa fa-universal-access"></i>سطح دسترسی به سایت:</p>
                        <select class="form-control" name="role">
                            <option value="user" @if($user->role == 'user') selected @endif>
                                کاربر
                            </option>
                            <option value="admin" @if($user->role == 'admin') selected @endif>
                                ادمین سایت
                            </option>
                        </select>

                        <p><i class="fa fa-user-times"></i>حذف حساب کاربری:</p>
                        <select class="form-control" name="del">
                            <option value="0" @if($user->del == 0) selected @endif>
                                فعال است
                            </option>
                            <option value="1" @if($user->del == 1) selected @endif>
                                حذف شود
                            </option>
                        </select>

                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <br>
                        <button type="submit" class="btn btn-success">
                            به روز رسانی
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection