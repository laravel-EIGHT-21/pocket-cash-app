<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolTransactions extends Model
{
    use HasFactory;


    protected $guarded = [];


         
    public function school(){
        return $this->belongsTo(Schools::class,'school_id','school_id_no');
    }



}
