<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'branch_id',
        'delivery_person_id',
        'total_price',
        'status',
        'delivery_type',
    ];

    public function pizzas()
    {
        return $this->belongsToMany(PizzaSize::class, 'order_pizza')
            ->withPivot('quantity')
            ->withTimestamps();
    }


    public function size()
    {
        return $this->belongsTo(PizzaSize::class, 'pizza_size_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function pizzaSizes()
    {
        return $this->belongsToMany(PizzaSize::class, 'order_pizza')
            ->withPivot('quantity')
            ->withTimestamps();
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'order_ingredient')->withTimestamps();
    }
    public function extraIngredients()
    {
        return $this->belongsToMany(ExtraIngredient::class, 'order_extra_ingredient')
            ->withTimestamps();
    }

    public function deliveryPerson()
    {
        return $this->belongsTo(Employee::class, 'delivery_person_id');
    }

}
