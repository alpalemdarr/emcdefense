<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_path',
        'group',
        'url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo_path ? asset('storage/'.$this->logo_path) : null;
    }

    public static function getGroupLabel(string $group): string
    {
        return match ($group) {
            'shielded_rooms' => 'Shielded Rooms & Test Cabins',
            'tempest_filters' => 'TEMPEST Filters & Custom Filters',
            'instruments' => 'Instruments, Antennas & Accessories',
            default => 'General',
        };
    }
}
