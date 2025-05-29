<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = "users";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function client()
    {
        return $this->hasOne(Client::class);
    }
    /*protected $fillable = ['name', 'email', 'password', 'role'];

    
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }*/
}
