<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'address',
        'total_price',
        'status',
        'note'
    ];

    public function user() {
        return $this -> belongsTo(User::class);
    }

}
