<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['name','designation','status','doj','basic_salary','absences','late','other_deduction'
        ,'lunch','tax_ded','bonus','total_deduction','net_payable'];
}
