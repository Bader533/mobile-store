<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        $trackings = Tracking::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.tracking.index', ['trackings' => $trackings]);
    }
}
