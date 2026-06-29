<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeBanner extends Model
{
    use SoftDeletes;

    protected $table = 'home_banners';

    protected $fillable = [
        'title',
        'sub_title',
        'image',
        'image_meta_tag',
        'sort_order',
        'button_text',
        'button_url',
        'status',
    ];
}
