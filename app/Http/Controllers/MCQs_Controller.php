<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MCQ;
use App\Models\Quiz;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class MCQs_Controller extends Controller
{
    //
    function addMCQs(Request $request){
        $request->validate([
            "question"=>"required|min:5|unique:mcqs,question",
            "opt_A"=>"required",
            "opt_B"=>"required",
            "opt_C"=>"required",
            "opt_D"=>"required",
            "correct_answer"=>"required",
        ]);
        $admin= Session::get('admin');
        if($admin)
        {
                // return $request;
                $quiz= Session::get('quizDetails');
                $admin= Session::get('admin');
                $mcq = new MCQ();

                $mcq->question = $request->question;
                $mcq->opt_A= $request->opt_A;
                $mcq->opt_B = $request->opt_B;
                $mcq->opt_C = $request->opt_C;
                $mcq->opt_D = $request->opt_D;
                $mcq->correct_answer = $request->correct_answer;
                $mcq->quiz_id = $quiz->id;
                $mcq->admin_id = $admin->id;
                $mcq->category_id = $quiz->category_id;

                if($mcq->save()){
                    if($request->submit=="add_more")
                    {
                        // return redirect(url()->previous());
                        return redirect('/add-quiz');
                    }else
                    {
                        Session::forget('quizDetails');
                        return redirect('/admin-categories');
                    }
                }


        }
    }

    function endQuiz(){
        Session::forget('quizDetails');
        return redirect('/admin-categories');
    }

    function showMCQs(int $id){
        $admin = Session::get('admin');
        $mcqs= MCQ::where('quiz_id',$id)->get();        
        if($admin)
            return view('Show_MCQs',['name'=>$admin->name,"mcqs"=>$mcqs]);
        else
            return view('admin-login');
    }
}
