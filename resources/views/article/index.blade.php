@extends('layouts.article')

@section('title')
    صفحه اصلی مقالات
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

    <div class="container margin_10">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-6 col-xs-12">
                <div class="row">
                    @foreach($article_box_1 as $n)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 art_index_box scale_50">
                            <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                               target="_blank">
                                <img src="{{ url('/').$n->avatar }}" alt="{{ $n->title }}">
                            </a>
                            <span class="post_category">
                            دسته:
                            <a href="">
                                <?= \App\Category::where('id', $n->cat_id)->value('name'); ?>
                            </a>
                            </span>
                            <a href="{{ url('/article/').'/'.$n->id.'/'.$n->title_url }}"
                               target="_blank">
                                <p class="title">{{ $n->title }}</p>
                                <div class="post_content">
                                    <?php echo substr($n->seo_des,0,400); ?>
                                </div>
                                <p class="post_continue">
                                    <i class="icon arrow left"></i>
                                    ادامه مطلب
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row" style="margin: auto;padding: 10px;">
                    {{ $article_box_1->render()  }}
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
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
        </div>
    </div>
@endsection