<?php

namespace App\Jobs;

use App\Helpers\Helper;
use App\Models\MonthyInstallment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckTableInstallmentJob implements ShouldQueue
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
        $monthyInstallment = MonthyInstallment::where('status', ['waiting', 'late'])->get();

        foreach ($monthyInstallment as $monthy) {
            $carbonDate = Carbon::parse($monthy->pay_date);
            // Subtract 5 days from the Carbon instance to get the date 5 days before the given date
            $previousDate = $carbonDate->subDays(5);
            $previousDateStr = $previousDate->toDateString();
            // Add 5 days to the Carbon instance to get the date 5 days after the given date
            $nextDate = $carbonDate->addDays(5);
            $nextDateStr = $nextDate->toDateString();
            //current date
            $currentDate = Carbon::now()->toDateString();

            $to = '+' . $monthy->contract->order->customer->phone;

            if (Carbon::parse($monthy->pay_date)->format('Y-m-d') == $currentDate) {
                //
                $message = " اليوم موعد دفع القسط رقم" . $monthy->installment_number . " فى تاريخ " . Carbon::parse($monthy->pay_date)->format('Y-m-d');
                $messageSid = Helper::sendMessage($to, $message);
            } elseif ($previousDateStr == $currentDate) {
                //
                $message = " اقترب موعد دفع القسط رقم " . $monthy->installment_number . " فى تاريخ " . Carbon::parse($monthy->pay_date)->format('Y-m-d');
                $messageSid = Helper::sendMessage($to, $message);
            } elseif ($nextDateStr == $currentDate) {
                //
                $message = " لقد تاخرت فى دفع القسط رقم" . $monthy->installment_number . " فى تاريخ " . Carbon::parse($monthy->pay_date)->format('Y-m-d');
                $messageSid = Helper::sendMessage($to, $message);
            }
        }
    }
}
