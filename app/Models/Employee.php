<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_job_id',
        'employee_id',
        'employee_name',
        'employee_job_name'
    ];



    

}
