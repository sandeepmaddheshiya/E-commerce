<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A product has many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // A product has many cart items
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}

