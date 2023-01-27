<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class,'id');
    }

    public function student_data(){
        return $this->belongsTo(StudentData::class,'user_id','user_id');
    }

    public function file(){
        return $this->hasOne(StudentFile::class,'user_id','user_id');
    }

    public function teacher_schedule(){
        return $this->hasMany(TeacherSchedule::class,'user_id','user_id');
    }
}
