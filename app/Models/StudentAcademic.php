<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAcademic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function year(){
        return $this->belongsTo(YearLevel::class,'yearlevel_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function departments(){
        return $this->hasMany(Department::class,'id','department_id');
    }

    public function schedule(){
        return $this->hasOne(StudentSchedule::class);
    }

    public function schedules(){
        return $this->hasMany(StudentSchedule::class);
    }

    public function detail(){
        return $this->belongsTo(Details::class,'user_id','user_id');
    }

    // public function schedules(){
    //     return $this->belongsTo(StudentSchedule::class);
    // }
}
