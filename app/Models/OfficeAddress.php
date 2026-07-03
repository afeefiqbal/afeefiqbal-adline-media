<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeAddress extends Model
{
    use SoftDeletes;
    
    protected $table = 'office_address';

    protected $fillable = [
        'title',
        'mobile',
        'address',
        'image',
        'image_attribute',
        'status',
        'sort_order',
    ];
}
