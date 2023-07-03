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
        return $this->belongsTo(User::class,'student_id','id');
    }


        
    /** @var array The attributes that should be encrypted/decrypted */
    protected $encryptable = [

        'student_acct_no',
        'docs',


    ];


}
