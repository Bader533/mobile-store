<?php

namespace App\Jobs;

use App\Models\MonthyInstallment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckStatusInstallmentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $monthyInstallment = MonthyInstallment::where('status', 'waiting')->get();

        foreach ($monthyInstallment as $monthy) {
            $currentDate = Carbon::now()->toDateString();
            $payDate = Carbon::parse($monthy->pay_date)->toDateString();
            $fiveDaysAfterPayDate = Carbon::parse($monthy->pay_date)->addDays(5)->toDateString();
            if ($currentDate >= $fiveDaysAfterPayDate && $monthy->status === 'waiting') {
                $monthy->status = 'late';
                $monthy->save();
            }
        }
    }
}
