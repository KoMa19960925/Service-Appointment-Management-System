<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechnicianPayment extends Model
{
    protected $fillable = [
        'assigned_technician_id',
        'technician_id',
        'service_request_id',
        'amount',
        'work_start_time',
        'work_end_time',
        'work_description',
        'payment_method',
        'payment_status',
        'paid_at',
        'payment_reference',
        'notes',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function assignedTechnician(): BelongsTo
    {
        return $this->belongsTo(
            Assignedtechnician::class,
            'assigned_technician_id'
        );
    }

    public function technician(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'technician_id'
        );
    }

    public function serviceRequest(): BelongsTo
    {
        return $this->belongsTo(
            ServiceRequest::class,
            'service_request_id'
        );
    }

    public function purchaseItems(): HasMany
    {
        return $this->hasMany(
            TechnicianPurchaseItem::class,
            'technician_payment_id'
        );
    }

    public function purchaseImages(): HasMany
    {
        return $this->hasMany(
            TechnicianPurchaseImage::class,
            'technician_payment_id'
        );
    }
}