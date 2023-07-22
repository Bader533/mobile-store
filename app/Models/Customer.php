<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable
{
    use HasFactory, HasRoles;

    public function object()
    {
        return $this->morphTo();
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function monthyInstallments()
    {
        return $this->hasMany(MonthyInstallment::class);
    }

    public function trackings()
    {
        return $this->morphMany(Tracking::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function getCustomerNameAttribute()
    {
        $language = app()->getLocale();

        if ($language == 'en') {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }

    public function getPhoneNumberAttribute()
    {
        $maskedPhoneNumber = substr($this->phone, 3);
        return $maskedPhoneNumber;
    }
}
