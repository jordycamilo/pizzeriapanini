<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role'];

    public function client()
    {
        return $this->hasOne(Client::class);
    }
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
