<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class QuizController extends Controller
{
    //
    public function addQuiz(){
        // return Session::get('quizDetails');
        $admin = Session::get('admin');
        if($admin){
            $categories= Category::get();
            $quiz_name = request('quiz_name');
            $category_id = request('category_id');
            if($quiz_name && $category_id && !Session::has('quizDetails')){
                $quiz = new Quiz();
                $quiz->quiz_name = $quiz_name;
                $quiz->category_id = $category_id;
                if($quiz->save())
                    Session::put('quizDetails',$quiz);

            }
            return view('add-quiz',['name'=>$admin->name,"categories"=>$categories]);
        }
        else{
            return view('admin-login');
        }
    }
}
