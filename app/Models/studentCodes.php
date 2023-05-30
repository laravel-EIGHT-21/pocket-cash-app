<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentCodes extends Model
{
    use HasFactory;

    protected $guarded = [];

         
    public function student(){
        return $this->belongsTo(SchoolStudent::class,'student_id','id');
    }


}
