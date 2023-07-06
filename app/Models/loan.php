<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class loan extends Model
{
    use HasFactory;
    use EncryptableDbAttribute;

    protected $guarded = [];

         
    public function student(){
        return $this->belongsTo(User::class,'uuid','uuid');
    }




}
