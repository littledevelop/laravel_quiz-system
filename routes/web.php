<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view("/admin-login","admin-login");

Route::post("adminLogin",[adminController::class,'login']);

Route::get("dashboard",[adminController::class,'dashboard']);