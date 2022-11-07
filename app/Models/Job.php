<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_name',
        'job_id',
        
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
