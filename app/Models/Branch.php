<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Branch extends Authenticatable
{
    use
        HasFactory,
        HasRoles;

    public function images()
    {
        return $this->morphMany(Image::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function trackings()
    {
        return $this->morphMany(Tracking::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function monthyInstallments()
    {
        return $this->morphMany(MonthyInstallment::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function generateCustomers()
    {
        return $this->morphMany(Customer::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function getBranchNameAttribute()
    {
        $language = app()->getLocale();

        if ($language == 'en') {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }
}
