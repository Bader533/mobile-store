<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getContractId()
    {
        $year = Carbon::now()->format('y');
        return sprintf('YS %02d' . '.' . $year, $this->id);
    }

    public function monthyInstallment()
    {
        return $this->hasMany(MonthyInstallment::class);
    }

    public function checks()
    {
        return $this->hasMany(Check::class);
    }
}
