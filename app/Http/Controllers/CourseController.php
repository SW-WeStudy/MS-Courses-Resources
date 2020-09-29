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
    public function drop(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        $coursetodelete = Course::find($request->id);
        if($coursetodelete){
            if ($validator->fails()) {
                return response([
                    "ok" => false,
                    'errors' => $validator->errors()
                ], 200);
            } else {
                Course::destroy($request->id);
                return response([
                    "ok" => true,
                    "message" => "course deleted"
                ], 200);
            }
        }else{
            return response([
                "ok" => false,
                "message" => "the course does not exist"
            ], 200);
        }
        
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'forum' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                "ok" => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            Course::create([
                "name" => $request->name,
                "forum" => $request->forum
            ]);
            return response([
                "ok" => true,
                "message" => "course created"
            ], 200);
        }
    }
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        $coursetoedit = Course::find($request->id);
        if($coursetoedit){
            if ($validator->fails()) {
                return response([
                    "ok" => false,
                    'errors' => $validator->errors()
                ], 200);
            } else {
                $coursetoedit->update($request->all());
                return response([
                    "ok" => true,
                    "message" => "course updated"
                ], 200);
            }
        }else{
            return response([
                "ok" => false,
                "message" => "the course does not exist"
            ], 200);
        }
    }
    public function getusers(Request $request){
        $users =Course::find($request->id)->users;
        return response($users);
    }
}
