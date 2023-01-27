<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function schedule(){
        return $this->hasMany(StudentSchedule::class,'user_id','user_id');
    }

    public function file(){
        return $this->hasOne(StudentFile::class,'user_id','user_id');
    }

    public function student(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
