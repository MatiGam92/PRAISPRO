<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
    'name',
    'photo',
    'description',
    'base_price',
    'base_currency',
    'unit',
    'quantity',
    'iva_rate',
    'profit_margin',
    'final_currency',
    'final_price',
];
}
