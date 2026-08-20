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
}
