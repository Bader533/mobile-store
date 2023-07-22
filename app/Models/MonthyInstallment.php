<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthyInstallment extends Model
{
    use HasFactory;

    protected $fillable = [
        'pay_date',
        'paid_date',
        'price',
        'status',
        'installment_number',
        'customer_id',
        'contract_id',
    ];


    public function object()
    {
        return $this->morphTo();
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
