<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MCQs_Controller;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view("/admin-login","admin-login");

Route::post("adminLogin",[adminController::class,'login']);

Route::get("dashboard",[adminController::class,'dashboard']);

Route::get("admin-categories",[adminController::class,'categories']);

Route::get("admin-logout",[adminController::class,'logout']);

Route::post("add-category",[CategoryController::class,'addCategory']);

Route::get("category/delete/{id}",[CategoryController::class,'deleteCategory']);

Route::get("category/edit/{id}",[CategoryController::class,'editCategory']);

Route::get("add-quiz",[QuizController::class,'addQuiz']);

Route::post('add-mcqs',[MCQs_Controller::class,'addMCQs']);

Route::get('end-quiz',[MCQs_Controller::class,'endQuiz']);

Route::get('show-mcqs/{id}/{quizName}',[MCQs_Controller::class,'showMCQs']);

Route::get('quiz_list/{id}/{category}',[QuizController::class,'showQuiz']);