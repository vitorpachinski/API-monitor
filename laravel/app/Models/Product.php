<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "name",
        "price",
        "code",
        'category_id',
        'is_offer'
    ];
    protected $casts = [
        'is_offer' => 'boolean',
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}
