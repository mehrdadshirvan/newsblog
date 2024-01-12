@extends('layouts.article')

@section('title')
    مقالات | {{ $cat_name }}
@endsection

@section('header')
    <style>
        .pagination{
            margin: 0 auto;
            font-family: vazir;
            font-size: 12px;
        }
    </style>
@endsection

@section('content')

    @if(sizeof($new) == 4)
        <div class="container margin_10">
            <div class="row art_index_new">
                @foreach($new as $n)
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                           target="_blank">
                            <img src="{{ url('/').$n->avatar }}" alt="{{ $n->title }}">
                            <span class="post_jdate">{{ $n->jdate }}</span>
                            <span class="post_writer">{{ $n->writer }}</span>
                            <span class="post_category">
                            <?= \App\Category::where('id', $n->cat_id)->value('name'); ?>
                        </span>
                            <p class="title">{{ $n->title }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row margin_10">
            <p style="margin: 0;text-align: right;padding: 10px;font-family: vazir;font-size: 15px;">
                جستجو:
                {{ $cat_name }}
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row margin_10">
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 right_art">
                <p class="side_lable">
                    دیگر مقالات:
                </p>
                @foreach($article_side_1 as $n)
                    <div class="art_index_rand">
                        <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                           target="_blank">
                            <img src="{{ url('/').$n->avatar }}" alt="{{ $n->title }}">
                        </a>
                        <span class="">{{ $n->jdate }}</span>
                        <span class="">{{ $n->writer }}</span>
                        <span class="">
                            دسته:
                            <?= \App\Category::where('id', $n->cat_id)->value('name'); ?>
                            </span>
                        <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                           target="_blank">
                            <p class="title">{{ $n->title }}</p>
                            <div class="post_content">
                                <?php echo substr($n->seo_des, 0, 400); ?>
                            </div>
                        </a>
                    </div>
                @endforeach
                <p class="side_lable">
                    <i class="icon list ol"></i>
                    دسته بندی ها:
                </p>
                <div class="art_index_cat">
                    <ul>
                        @foreach($category_side as $c)
                            <li>
                                <a href="{{ url('/articles/category').'/'. $c->id .'/'. $c->ename_url }}">{{ $c->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <p class="side_lable">
                    <i class="icon eye"></i>
                    پربازدیدها:
                </p>
                @foreach($article_side_2 as $n)
                    <div class="art_index_rand">
                        <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                           target="_blank">
                            <img src="{{ url('/').$n->avatar }}" alt="{{ $n->title }}">
                        </a>
                        <span class="">{{ $n->jdate }}</span>
                        <span class="">{{ $n->writer }}</span>
                        <span class="">
                            دسته:
                            <?= \App\Category::where('id', $n->cat_id)->value('name'); ?>
                            </span>
                        <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                           target="_blank">
                            <p class="title">{{ $n->title }}</p>
                            <div class="post_content">
                                <?php echo substr($n->seo_des, 0, 400); ?>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 article_search_box bg-white">
                <div class="row">
                    @if(sizeof($result) == 0)
                        <p class="alert alert-warning text-center d-block w-100">
                            موردی یافت نشد
                        </p>
                    @endif
                    @foreach($result as $r)
                        <div class="art_filter_box">
                            <p class="title">{{ $r->title }}</p>
                            <a href="{{ url('/article/').'/'.$r->id.'/'.$r->title_url }}"
                               target="_blank">
                                <img src="{{ url('/').$r->avatar }}" alt="{{ $r->title }}">
                            </a>
                            <span class="">
                                تاریخ انتشار:
                                {{ $r->jdate }}
                            </span>
                            <span class="">
                                نویسنده:
                                {{ $r->writer }}
                            </span>
                            <span class="">
                            دسته:

                            <a href="{{ url('/articles/category').'/'.\App\Category::where('id', $r->cat_id)->value('id') . '/'. \App\Category::where('id', $r->cat_id)->value('ename_url') }}">
                                <?= \App\Category::where('id', $r->cat_id)->value('name'); ?>
                            </a>
                            </span>
                            <div class="post_content">
                                <?php echo substr($r->seo_des,0,600); ?>
                            </div>
                            <a href="{{ url('/article/').'/'.$r->id.'/'.$r->title_url }}"
                               target="_blank">
                                <p class="post_continue btn btn-success">
                                    <i class="icon arrow left"></i>
                                    ادامه مطلب
                                </p>
                            </a>


                        </div>
                    @endforeach
                </div>
                <div class="row" style="margin: auto;padding: 10px;">
                    {{ $result->render() }}
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 right_art">

                <p class="side_lable">
                    <i class="icon eye"></i>
                    پیشنهادات:
                </p>
                @foreach($article_side_2 as $n)
                    <div class="art_index_rand">
                        <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                           target="_blank">
                            <img src="{{ url('/').$n->avatar }}" alt="{{ $n->title }}">
                        </a>
                        <span class="">{{ $n->jdate }}</span>
                        <span class="">{{ $n->writer }}</span>
                        <span class="">
                            دسته:
                            <?= \App\Category::where('id', $n->cat_id)->value('name'); ?>
                            </span>
                        <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                           target="_blank">
                            <p class="title">{{ $n->title }}</p>
                            <div class="post_content">
                                <?php echo substr($n->seo_des, 0, 400); ?>
                            </div>
                        </a>
                    </div>
                @endforeach
                <p class="side_lable">
                    دیگر مقالات:
                </p>
                @foreach($article_side_1 as $n)
                    <div class="art_index_rand">
                        <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                           target="_blank">
                            <img src="{{ url('/').$n->avatar }}" alt="{{ $n->title }}">
                        </a>
                        <span class="">{{ $n->jdate }}</span>
                        <span class="">{{ $n->writer }}</span>
                        <span class="">
                            دسته:
                            <?= \App\Category::where('id', $n->cat_id)->value('name'); ?>
                            </span>
                        <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                           target="_blank">
                            <p class="title">{{ $n->title }}</p>
                            <div class="post_content">
                                <?php echo substr($n->seo_des, 0, 400); ?>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
