<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaSize extends Model
{
    use HasFactory;

    protected $fillable = ['pizza_id', 'size', 'price'];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_pizza')
            ->withPivot('quantity')
            ->withTimestamps();
    }

}
