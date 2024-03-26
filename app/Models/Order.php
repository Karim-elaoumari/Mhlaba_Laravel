<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "id";
    
    protected $fillable=[
        'quantity',
        'size',
        'color',
        'full_name',
        'phone',
        'city',
        'address',
        'comment',
        'status',
    ];

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
