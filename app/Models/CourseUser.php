<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CourseUser extends Model
{
    use HasFactory;
    protected $table = 'user_course';
    protected $primaryKey = 'id_user_course';
    protected $fillable = [
        'id_user',
        'id_course',
        'rol',
        'state'
    ];
    public function courses()
    {
        return $this->belongsTo('App\Models\Course','id_course','id_course');
    }
    public $timestamps = false;

}
