<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolStudent extends Model
{
    use HasFactory;

    protected $guarded = [];


     
    public function school(){
        return $this->belongsTo(Schools::class,'school_id','id');
    }

}
