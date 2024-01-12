@extends('layouts.admin')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">تنظیمات سایت</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="col-md-12 bg-white margin_10">
            <form action="{{ url('/admin/setting') }}" method="post" class="edit">
                <p>
                    عنوان سایت خود را بنویسید:
                </p>
                <input type="text"
                       value="{{ $site_name->content }}"
                       class="form-control"
                       name="site_name"
                       id="site_name">
                <p>
                    لینک تصویر لوگو خود را وارد کنید:
                    <span title="لینک مورد نظر را از تصاویر موجود در مدیریت فایل انتخاب کنید و کپی کنید و در این بخش قرار دهید.">
                        <i class="fa fa-question"></i>
                    </span>
                </p>
                <img src="{{ url('/') . $site_logo->img }}" alt="" style="width: 50px;">
                <input type="text"
                       value="{{ url('/') . $site_logo->img }}"
                       class="form-control"
                       name="logo"
                       id="logo">
                <p>
                   انتخاب رنگ بندی سایت:
                </p>
                <input type="color"
                       value="{{ $menu_color->content }}"
                       class="form-control"
                       name="menu_color"
                       id="menu_color">
                <br>
                @csrf
                <button class="btn btn-success">
                    <i class="fa fa-save"></i>
                    به روزسانی
                </button>
                <p></p>
            </form>
        </div>
    </div>
@endsection