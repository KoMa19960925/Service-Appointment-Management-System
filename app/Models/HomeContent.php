<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        'badge',
        'hero_title',
        'hero_subtitle',
        'hero_description',

        'feature_1_title',
        'feature_2_title',
        'feature_3_title',
        'feature_4_title',

        'process_title',

        'process_1_title',
        'process_1_description',

        'process_2_title',
        'process_2_description',

        'process_3_title',
        'process_3_description',

        'process_4_title',
        'process_4_description',
    ];
}