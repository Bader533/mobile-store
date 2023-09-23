<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $appends = ['employee_image'];

    public function images()
    {
        return $this->morphMany(Image::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function monthyInstallments()
    {
        return $this->morphMany(MonthyInstallment::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function generateCustomers()
    {
        return $this->morphMany(Customer::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function trackings()
    {
        return $this->morphMany(Tracking::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'object', 'object_type', 'object_id', 'id');
    }

    public function getEmployeeImageAttribute()
    {
        $image = $this->images->first();
        if ($image == null) {
            return 'assets/media/avatars/300-1.jpg';
        } else {
            return $image->url;
        }
    }
}
