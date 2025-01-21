<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'number',
        'year',
        'regulation_category_id',
        'description',
        'enacted_date',
        'external_link',
        'is_active'
    ];

    protected $casts = [
        'enacted_date' => 'date',
        'is_active' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(RegulationCategory::class, 'regulation_category_id');
    }

    public function getFullTitleAttribute()
    {
        return "{$this->category->code} No. {$this->number} Tahun {$this->year}";
    }
}
