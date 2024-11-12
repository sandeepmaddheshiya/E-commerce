<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // A payment belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

