<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_files extends Model
{
    use HasFactory;


    
    protected $guarded = [];

             
    public function student(){
        return $this->belongsTo(SchoolStudent::class,'student_acct_no','acct_id');
    }



}
