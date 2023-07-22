<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function installment()
    {
        return $this->belongsTo(Installment::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function guarantor()
    {
        return $this->belongsTo(Customer::class, 'guarantor_id', 'id');
    }

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
