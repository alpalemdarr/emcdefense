<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title_tr',
        'title_en',
        'badge_tr',
        'badge_en',
        'lead_tr',
        'lead_en',
        'content_tr',
        'content_en',
        'meta_title_tr',
        'meta_title_en',
        'meta_description_tr',
        'meta_description_en',
        'is_active',
        'is_system',
        'show_in_navbar',
        'show_in_footer',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_system' => 'boolean',
        'show_in_navbar' => 'boolean',
        'show_in_footer' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get locale-aware attribute dynamically.
     */
    public function getTitleAttribute(): string
    {
        $locale = App::getLocale();

        return ($locale === 'en' && ! empty($this->title_en)) ? $this->title_en : ($this->title_tr ?? '');
    }

    public function getBadgeAttribute(): ?string
    {
        $locale = App::getLocale();

        return ($locale === 'en' && ! empty($this->badge_en)) ? $this->badge_en : $this->badge_tr;
    }

    public function getLeadAttribute(): ?string
    {
        $locale = App::getLocale();

        return ($locale === 'en' && ! empty($this->lead_en)) ? $this->lead_en : $this->lead_tr;
    }

    public function getContentAttribute(): ?string
    {
        $locale = App::getLocale();

        return ($locale === 'en' && ! empty($this->content_en)) ? $this->content_en : $this->content_tr;
    }

    public function getMetaTitleAttribute(): ?string
    {
        $locale = App::getLocale();

        return ($locale === 'en' && ! empty($this->meta_title_en)) ? $this->meta_title_en : $this->meta_title_tr;
    }

    public function getMetaDescriptionAttribute(): ?string
    {
        $locale = App::getLocale();

        return ($locale === 'en' && ! empty($this->meta_description_en)) ? $this->meta_description_en : $this->meta_description_tr;
    }

    /**
     * Helper to find a page by its slug.
     */
    public static function getBySlug(string $slug): ?self
    {
        return static::where('slug', $slug)->first();
    }
}
