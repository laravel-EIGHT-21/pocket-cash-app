<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class SchoolTransactions extends Model
{
    use HasFactory;
    use EncryptableDbAttribute;


    protected $guarded = [];


         
    public function school(){
        return $this->belongsTo(Schools::class,'school_code','school_id_no');
    }



    
    
    /** @var array The attributes that should be encrypted/decrypted */
    protected $encryptable = [

        'name',
        'school_mobile',
        'bulk_amount',
        'reference_id',
        'externalId',


    ];






}
