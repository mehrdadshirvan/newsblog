<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileManagerController extends Controller
{
    public function index()
    {
        return View('admin.filemanager.index',[]);
    }
}
