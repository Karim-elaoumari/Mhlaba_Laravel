<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable=[
        'title',
        'slug',
        'desc',
        'price',
        'x_price',
        'main_image',
        'st1_image',
        'st2_image',
        'st3_image',
        'st4_image',
        'sizes',
        'colors',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
