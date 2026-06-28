<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function package()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
}
