<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $appends = ['customer_image'];

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

    public function getCustomerImageAttribute()
    {
        $image = $this->images->first();
        if ($image == null) {
            return 'assets/media/avatars/300-1.jpg';
        } else {
            return $image->url;
        }
    }

    // paid
    public function getPaidCountAttribute($customer)
    {
        return $this->monthyInstallments()->whereNotIn('status',  ['waiting', 'late'])->count();
    }

    public function getTotalPaidAttribute()
    {
        return  $this->monthyInstallments()->whereNotIn('status',  ['waiting', 'late'])->sum('price');
    }
    //end paid

    //un-paid
    public function getUnpaidCountAttribute()
    {
        return $this->monthyInstallments()->whereIn('status',  ['waiting', 'late'])->count();
    }

    public function getTotalUnpaidAttribute()
    {
        return $this->monthyInstallments()->whereIn('status',  ['waiting', 'late'])->sum('price');
    }
    //end un-paid

    public function getOnTimePaidAttribute()
    {
        return $this->monthyInstallments()->where('status',  'paid on time')->count();
    }

    public function getPaidLateAttribute()
    {
        return $this->monthyInstallments()->where('status',  'paid late')->count();
    }

    public function getPaidEarlyAttribute()
    {
        return $this->monthyInstallments()->where('status',  'paid early')->count();
    }
}
