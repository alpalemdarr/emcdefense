<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'group'];

    /**
     * Get a setting value with fallback default.
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        $all = static::allCached();
        if (! array_key_exists($key, $all)) {
            return $default;
        }

        return $all[$key] !== null ? $all[$key] : $default;
    }

    /**
     * Set a setting value.
     */
    public static function set(string $key, ?string $value, string $group = 'general'): self
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );

        Cache::forget('site_settings_all');

        return $setting;
    }

    /**
     * Get all settings cached.
     */
    public static function allCached(): array
    {
        return Cache::remember('site_settings_all', 3600, function () {
            return static::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Clear cached settings.
     */
    public static function clearCache(): void
    {
        Cache::forget('site_settings_all');
    }
}
