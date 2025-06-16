<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'description',
        'stock',
        'unit',
    ];

    public function logs() {
        return $this->hasMany(product_log::class, 'product_id');
    }
}
