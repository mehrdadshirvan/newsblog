@extends('layouts.article')

@section('title')
   {{ $ar->title }}
@endsection

@section('include')

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
                                <?php echo substr($n->seo_des,0,400); ?>
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
                                <?php echo substr($n->seo_des,0,400); ?>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 article_box bg-fff box_shadow">
                <a href="{{ url('/article').'/'.$ar->id.'/'.$ar->title_url }}">
                    <h1> {{ $ar->title }} </h1>
                </a>
                <img src="{{ url('/').$ar->avatar }}" alt="">
                <div class="main_article" style="font-family: yekan;">
                    <?= $ar->content; ?>
                </div>
                <div class="hr_hr_hr" style="background: #ccc"></div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer_art">
                    <p>
                        نویسنده:
                        <span>{{ $ar->writer }}</span>
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer_art">
                    <p>
                        <span>
                            {{ $ar->jdate }} | {{ $ar->time }}
                        </span>
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer_art">
                    <p>
                        زمان مطالعه:
                        <span>
                            {{ $ar->read_time }}
                        </span>
                        دقیقه
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer_art">
                    <p>
                        تعداد بازدید:
                        <span>
                            {{ $ar->views }}
                        </span>
                    </p>
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
                                <?php echo substr($n->seo_des,0,400); ?>
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
                                <?php echo substr($n->seo_des,0,400); ?>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
