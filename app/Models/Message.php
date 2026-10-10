<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'subject',
        'device_name',
        'brand_model',
        'voltage',
        'current',
        'product_standard',
        'usage_area',
        'operation_mode',
        'electronic_circuit',
        'power_type',
        'connectors',
        'dimensions',
        'device_description',
        'attachment',
        'message',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
