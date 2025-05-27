<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'current_stock',
    ];

    public function pizzas()
{
    return $this->belongsToMany(Pizza::class, 'pizza_raw_material')
                ->withPivot('quantity')
                ->withTimestamps();
}
    
}
