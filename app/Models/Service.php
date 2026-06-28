<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function parent(){
        return $this->belongsTo(SELF::class);
    }

    public function sub(){
        return $this->hasMany(SELF::class,'parent_id')->active();
    }

    public function portfolios(){
        return $this->hasMany(Portfolio::class)->active();
    }

    public function faqs()
    {
        return $this->hasMany(ServiceFaq::class)->orderBy('sort_order');
    }
}
