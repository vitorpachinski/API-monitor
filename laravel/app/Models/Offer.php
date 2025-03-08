<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        "image",
        "offer_price",
        "start_date",
        "end_date"
    ];
}
