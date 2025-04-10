<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'pizza_id',
        'pizza_size_id',
        'client_id',
        'order_type',
    ];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function size()
    {
        return $this->belongsTo(PizzaSize::class, 'pizza_size_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    
    public function ingredients()
{
    return $this->belongsToMany(Ingredient::class, 'order_ingredient')->withTimestamps();
}
}
