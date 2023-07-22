<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->morphMany(Image::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getProductNameAttribute()
    {
        $language = app()->getLocale();

        if ($language == 'en') {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }
}
