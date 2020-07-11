<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'title', 'quantity', 'category', 'status', 'rental_date', 'return_date'
    ];
}
