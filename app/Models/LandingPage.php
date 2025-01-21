<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'about_title',
        'about_content',
        'mission_title',
        'mission_content',
        'vision_title',
        'vision_content',
        'stats_clients',
        'stats_projects',
        'stats_partners',
        'contact_address',
        'contact_email',
        'contact_phone',
        'contact_whatsapp',
        'social_facebook',
        'social_twitter',
        'social_instagram',
        'social_linkedin',
        'footer_description',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected $casts = [
        'stats_clients' => 'integer',
        'stats_projects' => 'integer',
        'stats_partners' => 'integer',
    ];
}
