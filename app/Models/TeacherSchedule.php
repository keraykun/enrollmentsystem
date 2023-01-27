<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSchedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function yearlevel(){
        return $this->belongsTo(YearLevel::class);
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function teacher(){
        return $this->belongsTo(Details::class,'user_id','user_id');
    }
    public function student_schedule(){
        return $this->hasMany(StudentSchedule::class);
    }

    public function teacher_schedule(){
        return $this->hasOne(TeacherSchedule::class,'id');
    }


}
