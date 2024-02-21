<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'id_user', 'name_food', 'price_food', 'img_food', 'quantity', 'status', 'id_info_cart',
    ];
}
