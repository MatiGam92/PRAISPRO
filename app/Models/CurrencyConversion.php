<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyConversion extends Model
{
    protected $fillable = [
        'amount',
        'from_currency',
        'to_currency',
        'converted_amount',
        'rate_used',
    ];
}
