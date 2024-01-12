<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function show()
    {
        $new = Article::where(['del'=>0,'publish'=>1])
            ->orderBy('jdate','DESC')
            ->inRandomOrder()
            ->limit(4)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate']);

        //random
        $article_side_1 = Article::where(['del'=>0,'publish'=>1])
            ->inRandomOrder()
            ->limit(6)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate','seo_des']);

        //most view
        $article_side_2 = Article::where(['del'=>0,'publish'=>1])
            ->orderBy('views','DESC')
            ->limit(6)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate','seo_des']);

        //last
        $article_box_1 = Article::where(['del'=>0,'publish'=>1])
            ->orderBy('jdate','DESC')
            ->limit(16)
            ->paginate(20);


        $category_side = Category::where(['del'=>0])
            ->inRandomOrder()->get(['id','ename_url','name']);

        return View('article.index',[
            'new'=>$new,
            'article_side_1'=>$article_side_1,
            'article_side_2'=>$article_side_2,
            'article_box_1'=>$article_box_1,
            'category_side'=>$category_side,
        ]);
    }

    public function show_article($id,$title_url)
    {
        $article = Article::where(['del'=>0,'title_url'=>$title_url,'id'=>$id,'publish'=>1])->first();
        if($article == null){ return redirect('/error/404'); }

        $article->views = $article->views + 1;
        $article->save();

        $cat = $article->cat_id;
        $new = Article::where(['del'=>0,'publish'=>1,'cat_id'=>$cat])
            ->orderBy('jdate','DESC')
            ->limit(4)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate']);


        //random
        $article_side_1 = Article::where(['del'=>0,'publish'=>1])
            ->inRandomOrder()
            ->limit(6)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate','seo_des']);

        //most view
        $article_side_2 = Article::where(['del'=>0,'publish'=>1])
            ->orderBy('views','DESC')
            ->limit(6)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate','seo_des']);

        $category_side = Category::where(['del'=>0])
            ->inRandomOrder()->get(['id','ename_url','name']);

        return View('article.show_article',[
            'new'=>$new,
            'ar'=>$article,
            'article_side_1'=>$article_side_1,
            'article_side_2'=>$article_side_2,
            'category_side'=>$category_side,
            ]);
    }

    public function filter_by_category($id,$ename)
    {
        if($id != 0){
            $cat = Category::where(['id'=>$id,'ename_url'=>$ename])->first();
            if(!$cat){ return redirect('/error/404'); }
            $cat_name = $cat->name;
            $cat_ename_url = $cat->ename_url;
            $cat_id = $cat->id;
        }else{
            $cat_name = "متفرقه";
            $cat_ename_url = "other";
            $cat_id = 0;
        }

        $result = Article::where(['del'=>0,'publish'=>1,'cat_id'=>$cat_id])
            ->orderBy('id','DESC')
            ->paginate(5);

        //random
        $article_side_1 = Article::where(['del'=>0,'publish'=>1])
            ->inRandomOrder()
            ->limit(6)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate','seo_des']);

        //most view
        $article_side_2 = Article::where(['del'=>0,'publish'=>1])
            ->orderBy('views','DESC')
            ->limit(6)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate','seo_des']);

        $category_side = Category::where(['del'=>0])
            ->inRandomOrder()->get(['id','ename_url','name']);

        $new = Article::where(['del'=>0,'publish'=>1])->orderBy('id','DESC')->limit(5)
            ->get(['id','title_url','title','writer','jdate','avatar']);
        return View('article.article_filter',[
            'result'=>$result,
            'article_side_1'=>$article_side_1,
            'article_side_2'=>$article_side_2,
            'category_side'=>$category_side,
            'new'=>$new,
            'cat_name'=>$cat_name,
            'cat_ename_url'=>$cat_ename_url,
            'cat_id'=>$cat_id
        ]);

    }

    public function search(Request $request)
    {
        $cat_name = $request->get('search');
        $cat_ename_url = $request->get('search');
        $cat_id = 0;

        $result = Article::where('title','LIKE', '%'. $cat_name .'%')
            ->orWhere('seo_key','LIKE','%'. $cat_name.'%')
            ->orWhere('content','LIKE','%'. $cat_name.'%')
            ->where(['del'=>0,'publish'=>1,'cat_id'=>$cat_id])
            ->orderBy('id','DESC')
            ->paginate(10);

        //random
        $article_side_1 = Article::where(['del'=>0,'publish'=>1])
            ->inRandomOrder()
            ->limit(6)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate','seo_des']);

        //most view
        $article_side_2 = Article::where(['del'=>0,'publish'=>1])
            ->orderBy('views','DESC')
            ->limit(6)
            ->get(['id','title','title_url','cat_id','avatar','writer','views','jdate','seo_des']);

        $category_side = Category::where(['del'=>0])
            ->inRandomOrder()->get(['id','ename_url','name']);

        $new = Article::where(['del'=>0,'publish'=>1])->orderBy('id','DESC')->limit(5)
            ->get(['id','title_url','title','writer','jdate','avatar']);
        return View('article.article_filter',[
            'result'=>$result,
            'article_side_1'=>$article_side_1,
            'article_side_2'=>$article_side_2,
            'category_side'=>$category_side,
            'new'=>$new,
            'cat_name'=>$cat_name,
            'cat_ename_url'=>$cat_ename_url,
            'cat_id'=>$cat_id
        ]);
    }
}
