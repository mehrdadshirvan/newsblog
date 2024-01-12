@extends('layouts.admin')


@section('content')
    <style>
        .user_table{}
        .user_table tr{
            cursor: pointer;
        }
        .user_table tr > td ,
        .user_table tr > th{
            padding: 15px 2px;
            text-align: center;
            font-size: 14px;
        }
        .user_table tr > td > img{
            width: 50px;
        }
        .user_table tr > td > a{
            border-radius: 15px;
        }
        .user_table tr > td > a > i{}
    </style>

    <div class="container" style="background: #fff;box-shadow: 0px 3px 10px 0px #00000040;padding: 0;">
        <div class="row" >
            <div class="col-lg-12 col-md-12 col-sm-6">
                <table class="table table-hover table-striped user_table" style="margin-bottom: 0;direction: rtl">
                    <tr>
                        <th>\</th>
                        <th>عنوان فارسی</th>
                        <th>عنوان انگلیسی</th>
                        <th>والد</th>
                        <th>ویرایش</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($categories as $cat)
                        <tr>
                            <td style="width:30px">{{ $i }}.</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->ename }}</td>
                            <td>
                                @if($cat->parent_id == 0)
                                    بدون سردسته
                                    @else
                                    <?= \App\Category::where(['id'=>$cat->parent_id])->value('name'); ?>
                                @endif
                            </td>
                            <td style="    width: 45px;">
                                <a href="{{ url('/admin/category/edit/').'/'.$cat->id }}" class="btn btn-info">
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