<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerFeedback extends Model
{
    // protected $table = 'customer_feedback';

    protected $fillable = [
        'customer_id',
        'technician_id',
        'service_request_id',
        'rating',
        'comment',
        'customer_feedback'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo( User::class,'customer_id');
    }


    public function technician(): BelongsTo
    {
        return $this->belongsTo(User::class, 'technician_id');
    }


    public function serviceRequest(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class,'service_request_id' );
    }

}