<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    protected $fillable = [
        'hero_video',
        'hero_title',
        'hero_sub_title',
        'hero_button_text',
        'hero_button_url',
        'working_hours',
        'cta_contact_icon',
        'cta_location_icon',
        'cta_working_hours_icon',
        'testimonial_quote_icon',
        'cta_contact_icon_attribute',
        'cta_location_icon_attribute',
        'cta_working_hours_icon_attribute',
        'testimonial_quote_icon_attribute',
    ];
}
