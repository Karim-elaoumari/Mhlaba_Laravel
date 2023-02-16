<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'desc',
    ];
    public function Plats()
    {
        

        return $this->hasMany(Plat::class);
    }
}
