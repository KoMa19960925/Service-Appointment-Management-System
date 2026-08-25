<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'service_name',
        'description',
        'request_date',
        'request_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedTechnician()
    {
        return $this->hasOne(
            Assignedtechnician::class,
            'service_request_id'
        );
    }
}