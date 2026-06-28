<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;

    protected $table = 'our_teams';

    protected $fillable = [
        'title',
        'designation',
        'short_url',
        'description',
        'email',
        'phone',
        'experience',
        'image',
        'image_attribute',
        'sort_order',
        'status',
    ];
}
