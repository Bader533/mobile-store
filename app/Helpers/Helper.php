<?php

namespace App\Helpers;

use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class Helper
{
    public static function logTracking($activity)
    {
        if (Auth::guard('admin')->check()) {

            $guard = Auth::guard('admin')->user();
        } elseif (Auth::guard('branch')->check()) {

            $guard = Auth::guard('branch')->user();
        } elseif (Auth::guard('employee')->check()) {

            $guard = Auth::guard('employee')->user();
        } else {
            $guard = Auth::guard('customer')->user();
        }

        $palestineTime = Carbon::now('Asia/Gaza');
        $formattedTime = $palestineTime->format('H:i:s');

        $tracking = new Tracking();
        $tracking->activity = $activity;
        $tracking->time = $formattedTime;
        $guard->trackings()->save($tracking);
    }

    public static function sendMessage($to, $message)
    {
        $url = 'http://www.hotsms.ps/sendbulksms.php';
        $params = [
            'user_name' => 'Yazan Store',
            'user_pass' => '1859771',
            'sender' => 'Yazan Store',
            'mobile' => $to,
            'type' => '2',
            'text' => $message,
        ];

        $response = Http::get($url, $params);

        // Handle the response as needed
        if ($response->successful()) {
            // API request was successful
            $responseData = $response->json();
            // Process the response data
        } else {
            // API request failed
            $errorMessage = $response->body();
            // Handle the error
        }

        // $sid = getenv('TWILIO_ACCOUNT_SID');
        // $token = getenv('TWILIO_AUTH_TOKEN');
        // $twilio = new Client($sid, $token);

        // $message = $twilio->messages
        //     ->create(
        //         "whatsapp:" . $to, // to
        //         [
        //             "from" => "whatsapp:+14155238886",
        //             "body" => $message
        //         ]
        //     );

        // $sid = getenv("TWILIO_ACCOUNT_SID");
        // $token = getenv("TWILIO_AUTH_TOKEN");
        // print($message->sid);
        // $from = "+19452074509"; //19452074509
        // $twilio = new Client($sid, $token);

        // $message = $twilio->messages->create("whatsapp:" . $to, [
        //     "from" => "whatsapp:" . $from,
        //     "body" => $message,
        // ]);
        // dd($message);
        // return $message->sid;
    }
}
