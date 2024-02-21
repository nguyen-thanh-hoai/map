<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCart extends Model
{
    use HasFactory;
    protected $table = 'info_carts';
    protected $fillable = [
        'id_user','email', 'number_phone', 'address', 'status',
    ];
}
