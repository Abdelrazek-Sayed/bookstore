<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
   protected  $fillable =[
        'name'
    ];
// relation between two tables

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
