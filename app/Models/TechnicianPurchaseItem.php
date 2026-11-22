<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechnicianPurchaseItem extends Model
{
    protected $fillable = [
        'technician_payment_id',
        'item_name',
        'quantity',
        'item_description',
    ];

    public function technicianPayment(): BelongsTo
    {
        return $this->belongsTo(
            TechnicianPayment::class,
            'technician_payment_id'
        );
    }
}
