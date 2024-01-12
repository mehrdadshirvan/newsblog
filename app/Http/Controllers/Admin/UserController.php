<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\User;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show_users()
    {
        $users = User::orderBy('id','DESC')->get();
        return View('admin.user.show_users',['users'=>$users]);
    }

    public function show_user($id,Request $request){
        $user = User::find($id);
        return View('admin.user.edit_user',['user'=>$user]);
    }


    //update user by admin by user id
    public function update_user($id,Request $request){

        $this->validate($request,[
           'name'   => 'required|min:3',
           'email'  => 'required|email',
           'role'   => 'required',
           'del'    => 'required'
        ]);

        $user = User::find($id);
        $user->name      = request('name');
        $user->email     = request('email');
        $user->role      = request('role');
        $user->save();

        if($request->get('del') == 1){
            $user->delete();
            $up = Article::where(['user_id'=>$user->id])->update(['user_id'=>0]);
            return redirect('/admin/users');
        }
        return redirect()->back();

    }

    //update user password
    public function update_user_password($id,Request $request){
        $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
        ]);

        if(request('password')){
            $user = User::find($id);
            $user->password = bcrypt(request('password'));
            $user->save();
        }

        return redirect()->back();
    }

    //make new user page
    public function make_user(){
        return View('admin.user.make_user',[]);
    }

    //make new user
    public function make_user2(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $name = strtolower(request('name'));

        $query = DB::table('users')->insert([
            'name' => $name,
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'role' => 'user',
        ]);

        return redirect('/admin/users');

    }

}
