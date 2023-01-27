<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeVerified($query)
    {
        return $query->whereNotNull('email_verified_at');
    }

    public function detail(){
        return $this->belongsTo(Details::class,'id');
    }

    public function academic(){
        return $this->belongsTo(StudentAcademic::class,'id','user_id');
    }

    public function academics(){
        return $this->hasMany(StudentAcademic::class,'user_id')->orderBy('status','asc');
    }

    public function data(){
        return $this->belongsTo(StudentData::class,'id','user_id');
    }

    public function teacher_schedules(){
        return $this->hasMany(TeacherSchedule::class)->orderBy('status','asc');
    }

    public function file(){
        return $this->hasOne(StudentFile::class,'user_id');
    }

    public function lrn(){
        return $this->hasOne(TeacherLRN::class,'user_id');
    }
}
