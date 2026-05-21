<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    //
    public function addCategory(Request $request){
       $admin =  Session::get('admin');
       $request->validate([
        "cname"=>"required | min:3 | unique:categories,cname"
       ]);
       if(!$admin)
        Session::flash('category',"Creator not found");
       $category = new Category();
       $category->cname = $request->cname;
       $category->creator = $admin->name;
       if($category->save())
        {
            Session::flash('category',"Category ".$request->cname ." Added Successfully");
        }else
        {
            Session::flash('category',"Category ".$request->cname ."Not Added! Something Wrong");
        }
        return redirect('/admin-categories');
    }

    public function deleteCategory(int $id){
        // return $id;
        $isDelete = Category::find($id)->delete();

        if($isDelete)
            Session::flash("category","Success: Category is Deleted!");
        return redirect('/admin-categories');
    }

    public function editCategory(int $id){
        $category = Category::find($id);
        if($category)
            return $category;
    }
}
