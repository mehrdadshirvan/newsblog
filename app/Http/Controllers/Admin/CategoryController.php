<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CategoryController extends Controller
{

    // show all category in category table
    public function show_categories()
    {
        $categories = Category::where(['del'=>0])->orderBy('ename','ASC')->get();
        return View('admin.category.categories',['categories'=>$categories]);
    }


    // show category page by id and u can edit
    public function edit_category($id,Request $request)
    {
        $category = Category::find($id);
        return View('admin.category.edit_category',['category'=>$category]);
    }

    //update category by category id
    public function update_category($id,Request $request)
    {
        $cat = Category::find($id);

        $user_id = Auth::id();

        $this->validate($request,[
            'name' => 'required',
            'ename' => 'required',
            'del' => 'required'
        ]);

        $name   = request('name');
        $name_url   = str_replace(' ','-',$name);
        $ename  = request('ename');
        $ename_url  = str_replace(' ','-',$ename);
        $sort = request('sort');
        $del    = request('del');

        $cat->name = $name;
        $cat->name_url = $name_url;
        $cat->ename = $ename;
        $cat->ename_url = $ename_url;
        $cat->parent_id = 0;
        $cat->sort = $sort;
        $cat->del = $del;
        $cat->save();

        if($cat->del == 1){
            $up = Article::where(['cat_id'=>$cat->id])
                ->update(['cat_id'=>0]);
            return redirect('/admin/categories');
        }
        return redirect()->back();
    }



    //make new category page
    public function make_category()
    {
        return View('admin.category.make_category',[]);
    }

    public function make_category2(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'ename' => 'required',
        ]);


        $name_url = str_replace(" ","-",request('name'));
        $ename_url = str_replace(" ","-",request('ename'));

        $cat = new Category();
        $cat->user_id = Auth::id();
        $cat->name = request('name');
        $cat->name_url = $name_url;
        $cat->ename = request('ename');
        $cat->ename_url = $ename_url;
        $cat->parent_id = 0;
        $cat->sort = request('sort');
        $cat->del = 0;

        $cat->save();

        return redirect()->back();

    }



}
