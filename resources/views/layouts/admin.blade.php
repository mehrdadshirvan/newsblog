<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Piinstartp Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="stylesheet" href="{{ url('/public/admin/') . '/'. 'vendors/bootstrap/dist/css/bootstrap.min.css'}}">
    <link rel="stylesheet" href="{{ url('/public/admin/') . '/'. 'vendors/font-awesome/css/font-awesome.min.css'}}">
    <link rel="stylesheet" href="{{ url('/public/admin/') . '/'.'vendors/themify-icons/css/themify-icons.css'}}">
    <link rel="stylesheet" href="{{ url('/public/admin/') . '/'. 'vendors/flag-icon-css/css/flag-icon.min.css'}}">
    <link rel="stylesheet" href="{{ url('/public/admin/') . '/'.'vendors/selectFX/css/cs-skin-elastic.css' }}">
    <link rel="stylesheet" href="{{ url('/public/admin/') . '/'. 'vendors/jqvmap/dist/jqvmap.min.css'}}">


    <link rel="stylesheet" href="{{ url('/public/admin/').'/'.'assets/css/style.css'}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    {{--text aria editor box link--}}
    <link rel="stylesheet" href="{{ url('/public/froala/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/froala_editor.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/froala_style.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/code_view.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/emoticons.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/image_manager.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/colors.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/image.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/line_breaker.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/table.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/char_counter.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/video.min.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/fullscreen.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/quick_insert.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/plugins/file.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/css/themes/dark.css') }}">
    <link rel="stylesheet" href="{{ url('/public/froala/codemirror.min.css') }}">



    <link rel="stylesheet" href="{{ url('/public/btselect/bootstrap-select.css') }}">


    <style>
        .margin_10{
            margin: 10px auto;
        }
        .padding_0{
            padding: 0;
        }
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

        .my_table {
        }

        .my_table tr {
            cursor: pointer;
        }

        .my_table tr > td,
        .my_table tr > th {
            padding: 15px 2px;
            text-align: center;
            font-size: 14px;
        }

        .my_table tr > td > img {
            width: 50px;
        }

        .my_table tr > td > a {
            border-radius: 15px;
        }

        .my_table tr > td > a > i {
        }

        .edit {
            padding: 10px;
        }

        .edit p {
            margin: 0;
            padding: 10px 0;
            font-weight: 600;
             display: block;
            text-align: right;
            direction: rtl;
        }

        .edit p > i {
            margin-right: 5px;
        }

        .edit input {
             direction: rtl;
        }

        .edit select {
             direction: rtl;
        }
        .edit textarea {
             direction: rtl;
        }

        .edit select > option {
        }

        .edit select > optgroup {
            background: #ccc;
        }
        .red{
            color: #c10a25;
        }
    </style>

    <style>
        .category_box{
            max-height: 500px;
            overflow: scroll;
        }
        .category_box > ul{}
        .category_box > ul > li{}
        .category_box > n > li > p{}
        .category_box > ul > li > ul{
            padding-right: 20px;
        }
        .category_box > ul > li > ul > li{}
        .category_box > ul > li > ul > li > p{}
        .category_box > ul > li > ul > li > ul{
            padding-right: 40px;
        }
        .category_box > ul > li > ul > li > ul > li{}
        .category_box > ul > li > ul > li > ul > li > p{}
    </style>
</head>

<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/admin') }}"><img src="{{ url('/elFinder/files/earth_PNG21.png?_t=1559678454') }}"
                                                                    alt="Logo" style="width: 35px;"></a>
            <a class="navbar-brand hidden" href="{{ url('/admin') }}"><img src="{{ url('/elFinder/files/earth_PNG21.png?_t=1559678454') }}"
                                                                           alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active d-none">
                    <a href="{{ url('/admin') }}">
                        <i class="menu-icon fa fa-dashboard"></i>
                        داشبرد
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('/admin/show/file-manager') }}">
                        <i class="menu-icon fa fa-files-o"></i>
                        مدیرت فایل
                    </a>
                </li>

                <h3 class="menu-title" title="add | update | delete">AUD</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="menu-icon fa fa-user"></i>
                        کاربران
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-user"></i>
                            <a href="{{ url('/admin/users') }}">نمایش کاربران</a>
                        </li>
                        <li>
                            <i class="fa fa-user-plus"></i>
                            <a href="{{ url('/admin/make-new-user') }}">ایجاد کاربر جدید</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-list"></i>
                        دسته بندی
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-list-alt"></i>
                            <a href="{{ url('/admin/categories') }}">
                                نمایش دسته ها
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-plus"></i>
                            <a href="{{ url('/admin/make-new-category') }}">
                                ایجاد دسته جدید
                            </a>
                        </li>
                    </ul>
                </li>
                <h3 class="menu-title">Posts</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-list-alt"></i>
                        مقالات
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="menu-icon fa fa-pencil"></i>
                            <a href="{{ url('/admin/article') }}">
                                لیست مقالات
                            </a>
                        </li>
                        <li>
                            <i class="menu-icon fa fa-plus"></i>
                            <a href="{{ url('/admin/make-new-article') }}">
                                ایجاد
                            </a>
                        </li>
                    </ul>
                </li>

                <h3 class="menu-title d-none">Setting</h3><!-- /.menu-title -->
                <li class="active d-none">
                    <a href="{{ url('/admin/setting') }}">
                        <i class="menu-icon fa fa-dashboard"></i>
                        تنظیمات
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">
            <div class="col-sm-12">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{ url('/admin/user/edit/') .'/'.auth()->user()->id }}"><i
                                    class="fa fa-user"></i>
                            ویرایش پروفایل
                        </a>
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="fa fa-power-off"></i>
                            خروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->


    <!-- start content -->
@yield('content')
<!--  end content  -->

</div><!-- /#right-panel -->

<!-- Right Panel -->

{{--js of textaria editor--}}
<script type="text/javascript" src="{{ url('/public/froala/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/languages/fa.js') }}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/languages/en_ca.js') }}"></script>
<script type="text/javascript" src="{{ url('/public/froala/codemirror.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/public/froala/xml.min.js')}}"></script>

<script type="text/javascript" src="{{ url('/public/froala/js/froala_editor.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/align.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/code_beautifier.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/code_view.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/colors.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/draggable.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/emoticons.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/font_size.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/font_family.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/image.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/file.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/image_manager.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/line_breaker.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/link.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/lists.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/paragraph_format.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/paragraph_style.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/table.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/video.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/url.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/entities.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/char_counter.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/inline_style.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/save.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/fullscreen.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/quick_insert.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/public/froala/js/plugins/quote.min.js')}}"></script>


<script src="{{ url('/public/admin/').'/'.'vendors/jquery/dist/jquery.min.js'}}"></script>
<script src="{{ url('/public/admin/').'/'.'vendors/popper.js/dist/umd/popper.min.js'}}"></script>
<script src="{{ url('/public/admin/').'/'.'vendors/bootstrap/dist/js/bootstrap.min.js'}}"></script>
<script src="{{ url('/public/admin/').'/'.'assets/js/main.js'}}"></script>


<script src="{{ url('/public/admin/').'/'.'vendors/chart.js/dist/Chart.bundle.min.js'}}"></script>
<script src="{{ url('/public/admin/').'/'.'assets/js/dashboard.js'}}"></script>
<script src="{{ url('/public/admin/').'/'.'assets/js/widgets.js'}}"></script>
<script src="{{ url('/public/admin/').'/'.'vendors/jqvmap/dist/jquery.vmap.min.js'}}"></script>
<script src="{{ url('/public/admin/').'/'.'vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'}}"></script>
<script src="{{ url('/public/admin/').'/'.'vendors/jqvmap/dist/maps/jquery.vmap.world.js'}}"></script>

<script src="{{ url('/public/btselect/bootstrap-select.js') }}"></script>
<script>
    (function ($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>
<script>
    $(function () {
        $('#edit')
            .on('froalaEditor.initialized', function (e, editor) {
                $('#edit').parents('form').on('submit', function () {
                    //console.log($('#edit').val());
                    //return false;
                })
            })
            .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})
    });

    $(function () {
        $('#edit2')
            .on('froalaEditor.initialized', function (e, editor) {
                $('#edit2').parents('form').on('submit', function () {});
            })
            .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})
    });

</script>

@yield('script')


</body>

</html>
