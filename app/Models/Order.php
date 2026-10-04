<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'code',
        'tiket_id',
        'buyer_name',
        'buyer_email',
        'quantity',
        'unit_price',
        'total_price',
        'status',
    ];

    public function tiket(): BelongsTo
    {
        return $this->belongsTo(Tiket::class);
    }
}