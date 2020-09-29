<?php

use Illuminate\Support\Facades\Route;
// controllers
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\NoteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/course/getall", [CourseController::class,'index']);
Route::get("/course/getusers", [CourseController::class,'getusers']);
Route::post("/course/create", [CourseController::class,'create']);
Route::put('/course/edit',[CourseController::class,'edit']);
Route::delete('/course/delete',[CourseController::class,'drop']);

// users
Route::get("/course/getbyuser",[CourseUserController::class,'getcourses']);
Route::post("/course/adduser",[CourseUserController::class,'adduser']);
Route::delete("/course/removeuser",[CourseUserController::class,'removeuser']);

//notes
Route::post("/course/note/create",[NoteController::class,"create"]);
Route::put("/course/note/edit",[NoteController::class,"edit"]);
Route::delete("/course/note/delete",[NoteController::class,"delete"]);
Route::put("/course/note/qualify",[NoteController::class,"qualify"]);
Route::get("/course/note/getnotesbyclass",[NoteController::class,"getbycourse"]);