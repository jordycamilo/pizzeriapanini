<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position',
        'identification_number',
        'salary',
        'hire_date',
    ];

    // Relación inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function deliveryOrders()
    {
        return $this->hasMany(Order::class, 'delivery_person_id');
    }

}
