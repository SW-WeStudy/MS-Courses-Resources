<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
// models
use App\Models\Course;


class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return $courses;
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'forum' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                "state" => "error",
                'errors'=>$validator->errors()
            ],200);
        }else{
            Course::create([
                "name" => $request->name,
                "forum" => $request->forum
            ]);
            return response([
                "state" => "ok",
                "message" => "course created"
            ],200);
        }
    }
    public function edit(Request $request)
    {
        Course::whereId($request->id)->update($request->all());
        return response([
            "state" => "ok",
            "message" => "course created"
        ],200);
    }
}