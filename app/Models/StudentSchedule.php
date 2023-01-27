<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StudentSchedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function academic(){
        return $this->hasOne(StudentAcademic::class,'id','student_academic_id');
    }

    public function grade(){
        return $this->hasOne(Grade::class,'student_schedule_id');
    }

    public function schedule(){
        return $this->hasOne(TeacherSchedule::class,'id','teacher_schedule_id');
    }

    public function teacher_schedule(){
        return $this->belongsTo(TeacherSchedule::class);
    }

}
