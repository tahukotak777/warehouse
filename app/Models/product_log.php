<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_log extends Model
{
    protected $fillable = [
        'product_id',
        'mutation_type',
        'quantity',
    ];

    public function product() {
        return $this->belongsTo(products::class, 'product_id');
    }
}
