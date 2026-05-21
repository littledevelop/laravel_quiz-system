<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Category;

class adminController extends Controller
{
    //
    function login(Request $request)
    {
        $validation= $request->validate([
            "name"=>"required",
            "password"=>"required"
        ]);
        $admin = Admin::where([['name', '=', $request->name],['password', '=', $request->password]])->first();
        if(!$admin){
            $validation= $request->validate([
                "user"=>"required"
            ],[
                "user->required"=>"User doesn't exists"
            ]);
        }
        // $adminName =$admin->name;
        // return $admin;
        // return view('admin',compact(["name"=>$admin->name]));
        Session::put('admin',$admin);
        return redirect('dashboard');
    }

    function dashboard(){
      $admin= Session::get('admin');
      if($admin)
        return view('Admin',["name"=>$admin->name]);
      else
        return view('admin-login');
    }

    function categories(){
        $categories= Category::get();
        $admin=Session::get('admin');
        if($admin)
            return view('Categories',["name"=>$admin->name,"categories"=>$categories]);
        else
            return view('admin-login');
    }

    function logout(){
        Session::forget('admin');
        return redirect('admin-login');
    }

    // function addCategory(Request $request){
    //     return $request->input();
    // }
}
