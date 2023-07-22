<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $hidden = [
        'object_type',
        'name',
        'created_at',
        'updated_at',
    ];

    protected $appends = ['image_url'];

    public function object()
    {
        return $this->morphTo();
    }
}
