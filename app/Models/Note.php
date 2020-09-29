<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'Note';
    protected $primaryKey = 'id_note';
    protected $fillable = [
        'content',
        'id_user',
        'score',
        'id_course',
    ];
    public function courses()
    {
        return $this->belongsTo('App\Models\Course','id_course','id_course');
    }
}
