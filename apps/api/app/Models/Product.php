<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Atributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

$fillable = ['name', 'description', 'price', 'stock', 'position', 'enabled', 'category_id'];
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock', 'position', 'enabled', 'category_id'];
}
