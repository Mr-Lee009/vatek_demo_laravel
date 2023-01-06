<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Models\Booking;
use App\Models\Hotel;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::all();
        return response()->json($booking);
    }
}
