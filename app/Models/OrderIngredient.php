<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderIngredient extends Model
{
    use HasFactory;

    protected $table = 'order_ingredient';  // Indica la tabla si no sigue pluralización estándar

    protected $fillable = [
        'order_id',
        'ingredient_id',
    ];

    public $timestamps = true; // Si tu tabla tiene timestamps (created_at, updated_at)
}
