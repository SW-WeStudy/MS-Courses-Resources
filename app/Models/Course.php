<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'Course';
    protected $primaryKey = 'id_course';
    protected $fillable = [
        'name',
        'forum'
    ];
    public function users()
    {
        return $this->hasMany('App\Models\CourseUser','id_course');
    }
    public function notes()
    {
        return $this->hasMany('App\Models\Note','id_course');
    }
}
