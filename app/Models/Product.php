<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name',  'category', 'unit', 'stock', 'price', 'rack', 'description', 'expired_at'];
}
