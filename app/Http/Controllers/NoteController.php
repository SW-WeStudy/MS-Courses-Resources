<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Models\Note;
use App\Models\Course;

class NoteController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_course' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                "ok" => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            $CourseExist = Course::find($request->id_course);
            if ($CourseExist) {
                Note::create($request->all());
                return response([
                    "ok" => true,
                    "message" => "the note has been created"
                ], 200);
            } else {
                return response([
                    "ok" => false,
                    "message" => "The course not exists"
                ], 200);
            }
        }
    }
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_note' => 'required'
        ]);
        if ($validator->fails()) {
            return response([
                "ok" => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            $notetoupdate = Note::find($request->id_note);
            if ($notetoupdate) {
                $notetoupdate->update($request->all());
                return response([
                    "ok" => true,
                    "message" => "The note has been updated"
                ], 200);
            } else {
                return response([
                    "ok" => false,
                    "message" => "The note does not exist"
                ], 200);
            }
        }
    }
    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'id_note' => 'required'
        ]);
        if ($validator->fails()) {
            return response([
                "ok" => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            $notetodelete = Note::find($request->id_note);
            if ($notetodelete) {
                $notetodelete->delete();
                return response([
                    "ok" => true,
                    "message" => "The note has been deleted"
                ], 200);
            } else {
                return response([
                    "ok" => false,
                    "message" => "The note does not exist"
                ], 200);
            }
        }
    }
    public function qualify(Request $request){
        $validator = Validator::make($request->all(), [
            'id_note' => 'required',
            'score'=>'required'
        ]);
        if ($validator->fails()) {
            return response([
                "ok" => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            $notetoupdate = Note::find($request->id_note);
            if ($notetoupdate) {
                $notetoupdate->update([
                    'score'=>$request->score
                ]);
                return response([
                    "ok" => true,
                    "message" => "The note`s score has been updated"
                ], 200);
            } else {
                return response([
                    "ok" => false,
                    "message" => "The note does not exist"
                ], 200);
            }
        }
    }
    public function getbycourse(Request $request){
        $validator = Validator::make($request->all(), [
            'id_course' => 'required'
        ]);
        if ($validator->fails()) {
            return response([
                "ok" => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            $course = Course::find($request->id_course);
            if ($course) {
                $notes=Note::where([
                    "id_course"=>$request->id_course
                ])->get();
                return response(
                    $notes
                , 200);
            } else {
                return response([
                    "ok" => false,
                    "message" => "The course does not exist"
                ], 200);
            }
        }
    }
}
