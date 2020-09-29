<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Models\CourseUser;

class CourseUserController extends Controller
{
    public function adduser(Request $request){

        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_course' => 'required',
            'rol' => 'required',
            'state' => 'required'
        ]);
        if($validator->fails()){
            return response([
                "ok" => false,
                'errors' => $validator->errors()
            ], 200);
        }else{
            CourseUser::create($request->all());
            return response([
                "ok" => true,
                "message" => "user associated to course successfully"
            ], 200);
        }
        
    }
    public function getcourses(Request $request){
        $courses = CourseUser::where([
            "id_user"=>$request->id_user
        ])->get();
        return response(
            $courses
        , 200);
    }
    public function removeuser(Request $request){
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_course' => 'required'
        ]);
        if($validator->fails()){
            return response([
                "ok" => false,
                'errors' => $validator->errors()
            ], 200);
        }else{
            $courses = CourseUser::where($request->all())->delete();
            return response([
                "ok" => true,
                "message" => "user has been unassociated to course successfully"
            ], 200);
        }
        
    }
}
