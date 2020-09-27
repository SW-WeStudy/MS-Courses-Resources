<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// models
use App\Models\Course;


class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        return $courses;
    }
    public function create(Request $request){
        $request->validate([
            'name' =>'required',
            'forum' =>'required'
        ]);
        Course::create([
            "name"=>$request->name,
            "forum"=>$request->forum
        ]);
        return [
            "state"=>"ok",
            "message"=>"course created"
        ];
    }
    public function edit(){

    }
}
