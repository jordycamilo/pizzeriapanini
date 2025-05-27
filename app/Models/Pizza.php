<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function pizzaSizes()
    {
        return $this->hasMany(PizzaSize::class);
    }
    public function rawMaterials()
{
    return $this->belongsToMany(RawMaterial::class, 'pizza_raw_material')
                ->withPivot('quantity')
                ->withTimestamps();
}

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredients');
    }
    
}
