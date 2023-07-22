<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $hidden = [
        'object_type',
        'activity',
        'created_at',
        'updated_at',
    ];

    public function object()
    {
        return $this->morphTo();
    }
}
