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

        .categroy_edit_form {}
        .categroy_edit_form p{
            font-weight: 600;
            margin: 0;
            padding: 10px 0;
        }
        .categroy_edit_form p > i{}
        .categroy_edit_form input{
            padding: 2px 7px;
        }
    </style>
    <div class="container" style="background: #fff;box-shadow: 0px 3px 10px 0px #00000040;padding: 0;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6">
                <p class="user_label">
                    <i class="fa fa-list-alt"></i>
                    ایجاد دسته جدید
                </p>
            </div>
        </div>
    </div>

    <div class="container" style="background: #fff;box-shadow: 0px 3px 10px 0px #00000040;padding: 0;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="{{ url('/admin/make-new-category') }}" method="post" enctype="multipart/form-data" class="edit">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><i class="fa fa-pencil"></i>عنوان دسته:</p>
                        <input type="text" name="name" class="form-control">
                        <p><i class="fa fa-pencil"></i>عنوان انگلیسی:</p>
                        <input type="text" name="ename" class="form-control">
                        <p><i class="fa fa-sort"></i>
                            موقعیت دسته
                            (بین 1-10):
                        </p>
                        <input type="text" name="sort" class="form-control">

                        @csrf
                        <br>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i>
                            ایجاد
                        </button>
                        <br>
                        <p></p>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <script src="{{ url('/public/js/jquery3.2.1.min.js') }}"></script>
    <script>


        function readURL(input,id) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_preview_'+id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img_url_1").change(function() {
            readURL(this,1);
        });

        $("#img_url_2").change(function() {
            readURL(this,2);
        });

        $("#img_url_3").change(function() {
            readURL(this,3);
        });

    </script>
@endsection