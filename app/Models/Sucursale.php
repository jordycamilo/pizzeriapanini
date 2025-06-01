<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Sucursale extends Model
{
    use HasFactory;
    protected $table = "sucursales";
    protected $primaryKey = "id";
    public $timestamps = false;
    
}
