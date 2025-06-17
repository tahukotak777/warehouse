<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_log extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'mutation_type',
        'quantity',
    ];

    public function product() {
        return $this->belongsTo(products::class, 'product_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
