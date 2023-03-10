<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
