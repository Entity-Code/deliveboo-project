<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'subtotal',
        'quantity',
    ];

    public function dishes(){

        return $this -> belongsToMany(Dish::class);
    }

} 