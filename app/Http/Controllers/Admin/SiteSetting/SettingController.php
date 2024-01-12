<?php

namespace App\Http\Controllers\Admin\SiteSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteSettingPage;

class SettingController extends Controller
{
    public function index()
    {
        return redirect(url('/admin/article'));
        $site_name = SiteSettingPage::where(['page_name'=>'site','content_name'=>'site_name'])
            ->first();
        $site_logo = SiteSettingPage::where(['page_name'=>'site','content_name'=>'logo'])
            ->first();
        $menu_color = SiteSettingPage::where(['page_name'=>'site','content_name'=>'menu_color'])
            ->first();

        return View('admin.dashboard',[
            'site_name'=>$site_name,
            'site_logo'=>$site_logo,
            'menu_color'=>$menu_color,
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request,[
            'site_name'=>'required',
            'logo'=>'required',
            'menu_color'=>'required',
        ]);

        $base_url = url('/');
        $img = str_replace($base_url,'',$request->get('logo'));

        $site_name = SiteSettingPage::where(['page_name'=>'site','content_name'=>'site_name'])
            ->update(['content'=>$request->get('site_name')]);
        $site_logo = SiteSettingPage::where(['page_name'=>'site','content_name'=>'logo'])
            ->update(['img'=>$img]);
        $menu_color = SiteSettingPage::where(['page_name'=>'site','content_name'=>'menu_color'])
            ->update(['content'=>$request->get('menu_color')]);

        return redirect()->back();

    }
}
