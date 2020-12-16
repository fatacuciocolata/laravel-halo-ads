<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use User;
use Category;

class Ad extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'image',
        'description',
        'price',
        'currency',
        'city',
        'country',
        'category'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

}
