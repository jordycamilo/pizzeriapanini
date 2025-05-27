<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'raw_material_id',
        'quantity',
        'purchase_price',
        'purchase_date',
    ];

    // Relación con proveedor
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Relación con materia prima
    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }
}
