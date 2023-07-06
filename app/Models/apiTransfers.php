<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;


class apiTransfers extends Model
{
    use HasFactory;
    use EncryptableDbAttribute;

    protected $guarded = [];


    
         
    public function student(){
        return $this->belongsTo(User::class,'uuid','uuid');
    }


         
    public function school(){
        return $this->belongsTo(User::class,'school_id','school_id_no');
    }



    
    /** @var array The attributes that should be encrypted/decrypted */
    protected $encryptable = [
        'student_acct_no',
        'reference_id',
        'externalId',
        

    ];





}
