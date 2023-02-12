<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
    protected $table = "plats";
    protected $primaryKey = "id";
    
    protected $fillable=[
        'title',
        'price',
        'image',
        'desc',
        'categorie_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
