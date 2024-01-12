<?php

Route::get('/cc', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "1";

});

Route::get('/register',function (){
    return  View::make('error.404');
});
//Route::get('/password/reset',function (){
//    //return  View::make('error.404');
//});


Auth::routes();

Route::group(['middleware' => ['admin', 'api']], function () {
    Route::get('/admin', 'Admin\SiteSetting\SettingController@index');

    //file manager
    Route::get('/admin/show/file-manager','Admin\FileManagerController@index');

    //user route
    Route::get('/admin/users', 'Admin\UserController@show_users');
    Route::get('/admin/user/edit/{id}', 'Admin\UserController@show_user');
    Route::post('/admin/user/update/{id}', 'Admin\UserController@update_user');
    Route::post('/admin/user/update/password/{id}', 'Admin\UserController@update_user_password');
    Route::get('/admin/make-new-user', 'Admin\UserController@make_user');
    Route::post('/admin/make-new-user', 'Admin\UserController@make_user2');

    //category Route
    Route::get('/admin/categories', 'Admin\CategoryController@show_categories');
    Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit_category');
    Route::post('/admin/category/update/{id}', 'Admin\CategoryController@update_category');
    Route::get('/admin/make-new-category', 'Admin\CategoryController@make_category');
    Route::post('/admin/make-new-category', 'Admin\CategoryController@make_category2');

    //article
    Route::get('/admin/article','Admin\ArticleController@show_all_article');
    Route::get('/admin/article/edit/{id}','Admin\ArticleController@edit_article');
    Route::get('/admin/article/show-demo/{id}','Admin\ArticleController@demo_article');
    Route::post('/admin/article/update/{id}','Admin\ArticleController@update_article');
    Route::post('/admin/article/del','Admin\ArticleController@del_article');
    Route::get('/admin/make-new-article','Admin\ArticleController@make_article');
    Route::post('/admin/make-new-article','Admin\ArticleController@make_article2');

    Route::get('/admin/setting','Admin\SiteSetting\SettingController@index');
    Route::post('/admin/setting','Admin\SiteSetting\SettingController@save');

});

Route::get('/','ArticleController@show');
Route::get('/articles/category/{id}/{ename}','ArticleController@filter_by_category');
Route::get('/article/{id}/{title}','ArticleController@show_article');
Route::get('/search','ArticleController@search');

Route::get('/404',function() {
    return  View::make('error.404');
});

Route::any('{query}',function() {
    return  View::make('error.404');
})->where('query', '.*');