@extends('layouts.admin')


@section('content')
    <style>
        .user_table{}
        .user_table tr{
            cursor: pointer;
        }
        .user_table tr > td, .user_table tr > th{
            padding: 15px 2px;
            text-align: center;
            font-size: 14px;
        }
        .user_table tr > td > img{
            width: 35px;
            border-radius: 50%;
        }
        .user_table tr > td > a{
            border-radius: 15px;
        }
        .user_table tr > td > a > i{}
    </style>

    <div class="container" style="background: #fff;box-shadow: 0px 3px 10px 0px #00000040;padding: 0;">
        <div class="row" >
            <div class="col-lg-12 col-md-12 col-sm-6">
                <table class="table table-hover table-striped user_table" style="direction: rtl;margin-bottom: 0">
                    <tr>
                        <th>\</th>
                        <th>نام کاربری</th>
                        <th>ایمیل</th>
                        <th>سطح دسترسی</th>
                        <th>ویرایش</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($users as $user)
                        <tr>
                            <td style="width:30px">{{ $i }}.</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td style="    width: 45px;">
                                <a href="{{ url('/admin/user/edit/').'/'.$user->id }}" class="btn btn-info">
                                    <i class="fa fa-pencil" ></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection