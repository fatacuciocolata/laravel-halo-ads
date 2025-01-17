<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Ad;

class Category extends Model
{
    use HasFactory;

    public function ad()
    {
        return $this->hasMany('App\Models\Ad');
    }
}
