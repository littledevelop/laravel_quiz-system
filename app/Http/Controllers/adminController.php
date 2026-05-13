<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;

class adminController extends Controller
{
    //
    function login(Request $request)
    {
        $validation= $request->validate([
            "name"=>"required",
            "password"=>"required"
        ]);
        $admin = admin::where([['name', '=', $request->name],['password', '=', $request->password]])->first();
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
}
