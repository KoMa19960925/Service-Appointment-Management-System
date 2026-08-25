<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignedtechnician extends Model
{
    protected $table = 'assignedtechnicians';

    protected $fillable = [
        'service_request_id',
        'technician_id',
        'status',
    ];

    public function serviceRequest()
    {
        return $this->belongsTo(
            ServiceRequest::class,
            'service_request_id'
        );
    }

    public function technician()
    {
        return $this->belongsTo(
            User::class,
            'technician_id'
        );
    }
}