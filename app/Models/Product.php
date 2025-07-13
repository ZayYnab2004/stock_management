<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $table = 'product'; // اسم الجدول مفرد كما في قاعدة البيانات

    protected $primaryKey = 'product_id';
    public $incrementing = false; // لأن المفتاح UUID وليس رقم تلقائي
    protected $keyType = 'string';

    protected $fillable = [
        'product_id',
        'business_id',
        'category_id',
        'supplier_id',
        'name',
        'barcode',
        'unit_price',
        'cost_price',
        'description',
        'expiration_date',
        'quantity_in_stock',
        'minimum_stock_threshold',
        'tax_rate',
        'status',
    ];

    // توليد UUID تلقائيًا عند إنشاء سجل جديد
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->product_id)) {
                $model->product_id = (string) Str::uuid();
            }
        });
    }
}
