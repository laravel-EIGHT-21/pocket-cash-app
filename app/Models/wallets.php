<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wallets extends Model
{
    use HasFactory;


        
         
    public function student(){
        return $this->belongsTo(User::class,'ui','uuid');
    }



}
