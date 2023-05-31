<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiTransfers extends Model
{
    use HasFactory;


    protected $guarded = [];


    
         
    public function student(){
        return $this->belongsTo(SchoolStudent::class,'student_acct_no','acct_id');
    }


         
    public function school(){
        return $this->belongsTo(Schools::class,'school_id','school_id_no');
    }


}
