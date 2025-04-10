<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_ingredients');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_ingredient');
    }
}
