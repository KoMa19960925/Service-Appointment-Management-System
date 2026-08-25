<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Assignedtechnician extends Model
{
    protected $fillable = [
        'service_request_id',
        'technician_id',
        'assigned_date',
        'assigned_time',
        'status',
        'image_1',
        'image_2',
    ];


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


    public function payment(): HasOne
    {
        return $this->hasOne(
            TechnicianPayment::class,
            'assigned_technician_id'
        );
    }
}



