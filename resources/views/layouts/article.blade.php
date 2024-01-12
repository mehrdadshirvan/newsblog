<?php
$category = \App\Category::where(['del'=>0,'parent_id'=>0])->orderBy('sort','ASC')->get();
$site_name = \App\SiteSettingPage::where(['page_name'=>'site','content_name'=>'site_name'])
    ->value('content');
$site_logo = \App\SiteSettingPage::where(['page_name'=>'site','content_name'=>'logo'])
    ->value('img');
$menu_color = \App\SiteSettingPage::where(['page_name'=>'site','content_name'=>'menu_color'])
    ->value('content');
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="manifest" href="/manifest.json?v=1.3">

    <title>@yield('title')</title>
    <script src="{{ url('/public/js/jquery3.2.1.min.js') }}"></script>
    <script src="{{ url('/public/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ url('/public/semantic/components/sticky.js') }}"></script>
    <script src="{{ url('/public/jquery-ui/jquery-ui.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('/public/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/public/semantic/components/button.css') }}">
    <link rel="stylesheet" href="{{ url('/public/semantic/components/icon.css') }}">
    <link rel="stylesheet" href="{{ url('/public/css/article.css') }}">
    <style>
        @font-face {
            font-family: 'vazir';
            src: url('{{ url('/public/vazir/Vazir.eot') }}');
            src: url('{{ url('/public/vazir/Vazir.woff') }}') format("woff"),
            url('{{ url('/public/vazir/Vazir.ttf') }}') format("truetype");
        }
        .side_lable {
            margin: 0;
            padding: 10px 20px;
            font-family: vazir;
            text-align: right;
            font-size: 14px;
            color: #ffffff;
            border: 2px solid #5a5a5a;
            background: {{ $menu_color }};
            border-top-left-radius: 50px;
            border-bottom-right-radius: 50px;
        }
        .box_lable{
            margin: 10px auto;
            padding: 10px 5px;
            font-family: vazir;
            text-align: right;
            font-size: 14px;
            color: {{ $menu_color }};
            border: 2px solid #004358;
            background: #fff;
            text-decoration: none;
        }
        .article_box > a > h1 {
            margin: 0;
            font-size: 19px;
            padding: 10px 0;
            text-align: right;
            color: {{ $menu_color }};
            font-family: yekan;
            direction: rtl;
            margin-bottom: 5px;
            border-bottom: 2px solid #ccc;
        }
        .art_filter_box > p {
            margin: 0;
            padding: 10px;
            text-align: right;
            font-family: vazir;
            background: {{ $menu_color }};
            color: #fff;
        }
    </style>
    @yield('header')
</head>
<body style="direction: rtl" id="body_main">
<header>
    <div class="container bg-white padding_0">
        <div class="row">
            <div class="col-xl-4 art_logo padding_0">
                <a href="{{ url('/') }}" style="text-decoration: none;">
                    <img src="{{ url('/').$site_logo }}" alt="">
                    <span>
                        {{ $site_name }}
                    </span>
                </a>
            </div>
            <div class="col-xl-8 art_search ">
                <form action="{{ url('/search') }}" method="get">
                    <input type="text"
                           name="search"
                           placeholder="جستجو کنید..."
                           class="form-control"
                           id="search">
                    <button class="btn">
                        <i class="icon search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: {{ $menu_color }};">
        <div class="container menu_art">
            <div class="row">
                <nav>
                    <ul class="nav">
                        @foreach($category as $cat)
                            <?php
                            //sub cat
                            $sub_cat = \App\Category::where(['del' => 0, 'parent_id' => $cat->id])->get();
                            ?>
                            <li class="dropdown">
                                <a href="@if($cat->link_to != NULL)
                                {{ $cat->link_to }}
                                @else
                                {{ url('/articles/category').'/'.$cat->id .'/'.$cat->ename_url }}
                                @endif"

                                   @if(sizeof($sub_cat) > 0)
                                   class="dropdown-toggle"
                                   data-toggle="dropdown"@endif >
                                    @if($cat->icon != null)
                                        <i class="icon {{ $cat->icon }}"></i>
                                    @endif
                                            <h2 style="font-size: 14px;margin: 0;display: inline-block;">{{ $cat->name }}</h2>
                                    <?php
                                    //sub cat
                                    $sub_cat = \App\Category::where(['del' => 0, 'parent_id' => $cat->id])->get();
                                    ?>
                                    @if(sizeof($sub_cat) > 0)
                                        <b class="caret"></b>
                                    @endif
                                </a>
                                @if(sizeof($sub_cat) > 0)
                                    <ul class="dropdown-menu box_shadow">
                                        @foreach($sub_cat as $s_cat)
                                            <li>
                                                <a href="@if($s_cat->link_to != NULL)
                                                {{ $s_cat->link_to }}
                                                @else
                                                {{ url('/articles/category') .'/'. $s_cat->id .'/'. $s_cat->ename_url }}
                                                @endif">
                                                    <h3 style="font-size: 14px;margin: 0;display: inline-block;">{{ $s_cat->name }}</h3>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<div id="main">
    @yield('content')
</div>

<footer class="footer">
    <div class="container-fluid">

        <div class="row footer_2">
            <div class="container transition50 ">
                <div class="hr_footer"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="float: left">

                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="float: left">
                    <p class="copyright_footer">
                        Copyright © 
                    </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="float: left"></div>
            </div>
        </div>

    </div>
</footer>

<script>
    //for menu
    $('ul.nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).show();
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).hide(200);
    });
</script>
@yield('footer')

</body>
</html>
