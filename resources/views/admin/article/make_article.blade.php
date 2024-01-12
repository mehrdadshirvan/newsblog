@extends('layouts.admin')

@section('content')
    <div class="container" style="background: #fff;box-shadow: 0px 3px 10px 0px #00000040;padding: 0;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6">
                <p class="user_label">
                    <i class="fa fa-pencil"></i>
                    make articel:
                    <span></span>
                </p>
            </div>
        </div>
    </div>

    <div class="container" style="background: #fff;box-shadow: 0px 3px 10px 0px #00000040;padding: 0;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="{{ url('/admin/make-new-article') }}" method="post"
                      enctype="multipart/form-data" class="edit">
                    <p>
                        <i class="fa fa-pencil"></i>
                        عنوان نوشته خود را بنویسید:
                    </p>
                    <input type="text"
                           name="title"
                           id="title"
                           class="form-control"
                           required>
                    <p>
                        <i class="fa fa-text-height"></i>
                        متن خود را بنویسید:
                    </p>
                    <textarea name="content" id="edit" required></textarea>

                    <p>
                        <i class="fa fa-image"></i>
                        لینک تصویر پیشفرض نمایش:
                    </p>
                    <input type="text"
                           name="avatar"
                           id="avatar"
                           class="form-control"
                           required>
                    <p>
                        <i class="fa fa-user"></i>
                        نویسنده:
                    </p>
                    <input type="text"
                           name="writer"
                           id="writer"
                           class="form-control"
                           required>
                    <p>
                        <i class="fa fa-calendar"></i>
                        زمان مطالعه: (به دقیقه)
                    </p>
                    <input type="text"
                           name="read_time"
                           id="read_time"
                           class="form-control"
                           required>
                    <p>
                        <i class="fa fa-list-ol"></i>
                        دسته مقاله را انتخاب کنید:
                    </p>
                    <select class="form-control" name="cat">
                        @foreach($cat as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>

                    <hr>
                    <p>
                        توضیح کوتاه(برای نمایش در خلاصه ایی از مطلب)
                    </p>
                    <textarea name="seo_des" class="form-control" rows="8"></textarea>
                    <hr>
                    <p>
                        <i class="fa fa-globe"></i>
                        وضعیت انشار مقاله؟
                    </p>
                    <select name="publish" class="form-control">
                        <option value="0">
                            پیش نویس
                        </option>
                        <option value="1">
                            انتشار یابد
                        </option>
                    </select>
                    <br>
                    @csrf
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-save"></i>
                        ذخیره
                    </button>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection