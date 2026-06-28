<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFaq extends Model
{
    protected $fillable = [
        'service_id',
        'question',
        'answer',
        'sort_order',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
