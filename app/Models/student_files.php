<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class student_files extends Model
{
    use HasFactory;
    use EncryptableDbAttribute;


    
    protected $guarded = [];

             
    public function student(){
        return $this->belongsTo(User::class,'uuid','uuid');
    }
 

        
    /** @var array The attributes that should be encrypted/decrypted */
    protected $encryptable = [

        'title',
        'docs',



    ];


}
