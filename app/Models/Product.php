<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'product_id';
    public $incrementing = false; // UUID string
    protected $keyType = 'string';

    protected $fillable = [
        'product_id',
        'name',
        'barcode',
        'unit_price',
        'cost_price',
        'description',
        'quantity_in_stock',
        'status',
    ];
}
