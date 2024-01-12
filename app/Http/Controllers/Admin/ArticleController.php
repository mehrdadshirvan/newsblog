<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function show_all_article(Request $request)
    {
        $article = Article::where(['del'=>0])->orderBy('id','DESC')->paginate(50);
        return View('admin.article.show_all',['article'=>$article]);
    }

    public function edit_article($id,Request $request)
    {
        $article = Article::find($id);
        $category = Category::where(['del'=>0])->orderBy('id','DESC')->get();
        return View('admin.article.edit_article',['ar'=>$article,'cat'=>$category]);
    }

    public function update_article($id,Request $request)
    {
        $save = Article::find($id);

        $title = $request->get('title');
        $title_url = str_replace(' ','-',$title);

        $bs_url = url('/');
        $avatar = $request->get('avatar');
        $avatar = str_replace( $bs_url,'',$avatar);

        $save->user_id = Auth::id();
        $save->title = $title;
        $save->title_url = $title_url;
        $save->content = $request->get('content');
        $save->avatar = $avatar;
        $save->writer = $request->get('writer');
        $save->read_time = $request->get('read_time');
        $save->jdate = $request->get('jdate');
        $save->time = $request->get('time');
        $save->cat_id = $request->get('cat');
        $save->seo_title = $request->get('seo_title');
        $save->seo_des = $request->get('seo_des');
        $save->seo_key = $request->get('seo_key');
        $save->publish = $request->get('publish');
        $save->save();


        return redirect()->back();
    }

    public function del_article(Request $request)
    {
        $id = $request->get('id');
        $up = Article::where(['id'=>$id])->update(['del'=>1]);
        return "ok";
    }

    public function make_article()
    {
        $category = Category::where(['del'=>0])->orderBy('id','DESC')->get();
        return View('admin.article.make_article',['cat'=>$category]);
    }
    public function make_article2(Request $request)
    {
        $c = jdate('o', time(), '', '', 'en');
        $b = jdate('m', time(), '', '', 'en');
        $a = jdate('j', time(), '', '', 'en');
        $jdate = $c . "-" . $b . "-" . $a;
        $time = date("H:m:s");

        $save = new Article();

        $title = $request->get('title');
        $title_url = str_replace(' ','-',$title);

        $bs_url = url('/');
        $avatar = $request->get('avatar');
        $avatar = str_replace( $bs_url,'',$avatar);

        $save->user_id = Auth::id();
        $save->title = $title;
        $save->title_url = $title_url;
        $save->content = $request->get('content');
        $save->avatar = $avatar;
        $save->writer = $request->get('writer');
        $save->read_time = $request->get('read_time');
        $save->jdate = $jdate;
        $save->time = $time;
        $save->cat_id = $request->get('cat');
        $save->seo_title = $request->get('seo_title');
        $save->seo_des = $request->get('seo_des');
        $save->seo_key = $request->get('seo_key');
        $save->publish = $request->get('publish');
        $save->save();


        return redirect()->back();
    }

    public function demo_article($id)
    {
        $ar = Article::where(['id'=>$id])->first();
        return View('admin.article.demo',['ar'=>$ar]);
    }
}
