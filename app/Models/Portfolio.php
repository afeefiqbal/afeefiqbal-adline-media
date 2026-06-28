<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class)->active();
    }

    public function thumbnail(){
        return $this->hasOne(PortfolioGallery::class, 'portfolio_id')
            ->where('status', 'Active')
            ->orderBy('id');
    }

    public function photos(){
        return $this->hasMany(PortfolioGallery::class)->where('status','Active');
    }
}
