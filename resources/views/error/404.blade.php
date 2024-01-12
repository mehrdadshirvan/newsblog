@extends('layouts.article')

@section('content')
<div class="container" style="margin: 10px auto;background: #fff;box-shadow: 0px 3px 1px 0px #00000040;padding: 15% 0;">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <p style="text-align: center;
    padding: 10px;
    margin: 0;
    font-size: 20px;
    font-weight: 600;
    font-family: yekan;
    color: #004358;">
                صفحه مورد نظر یافت نشد
            </p>
            <a href="{{ url('/') }}" style="display: block;
    text-align: center;
    font-size: 20px;
    font-family: yekan;
text-decoration: none">
                بازگشت به صفحه اصلی
            </a>
        </div>
    </div>
</div>
@endsection