<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'model_number',
        'short_description',
        'description',
        'specifications',
        'datasheet_path',
        'image_path',
        'video_path',
        'quote_email',
        'is_used_equipment',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'specifications' => 'array',
        'is_used_equipment' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getDatasheetUrlAttribute(): ?string
    {
        return $this->datasheet_path ? asset('storage/'.$this->datasheet_path) : null;
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image_path ? asset('storage/'.$this->image_path) : null;
    }

    public function getQuoteSubjectAttribute(): string
    {
        return urlencode($this->model_number.' - '.$this->name.' Quote Request');
    }

    public function getQuoteBodyAttribute(): string
    {
        return urlencode("Hello,\r\n\r\nI would like to request a quote for ".$this->name.' ('.$this->model_number.").\r\n\r\nProject Details:\r\n-\r\n\r\nQuantity:\r\n-\r\n\r\nThank you.");
    }

    public function getModelCodeAttribute(): ?string
    {
        return $this->model_number;
    }

    public function getSpecsArrayAttribute(): ?array
    {
        return is_array($this->specifications) ? $this->specifications : json_decode($this->specifications ?? '[]', true);
    }
}
