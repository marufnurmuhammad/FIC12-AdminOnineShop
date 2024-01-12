<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'price',
        'product_image',
        'category_id',
        'stock',
    ];

    #belongs to category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}