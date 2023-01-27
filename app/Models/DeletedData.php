<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedData extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class,'data_id')->where('deleted',1);
    }

    public function departments(){
        return $this->belongsTo(Department::class,'data_id')->where('deleted',1);
    }
}
