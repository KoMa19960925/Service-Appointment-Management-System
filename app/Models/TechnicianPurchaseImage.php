<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechnicianPurchaseImage extends Model
{
    protected $fillable = [
        'technician_payment_id',
        'image',
    ];

    public function technicianPayment(): BelongsTo
    {
        return $this->belongsTo(
            TechnicianPayment::class,
            'technician_payment_id'
        );
    }
}