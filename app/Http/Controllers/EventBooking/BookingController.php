<?php

namespace App\Http\Controllers\EventBooking;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventBooking\BookingPostRequest;
use App\Models\EventBooking\Booking;
use App\Services\EventBooking\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;

    public function __construct(BookingService $service)
    {
        $this->service = $service;
    }

    public function grid(Request $request, $number_per_page = null) 
    {
        return $this->service->grid($request, $number_per_page);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create($ticket_id, BookingPostRequest $request)
    {
        $this->authorize('create', Booking::class);
        return $this->service->create($ticket_id, $request->validated());
    }

    /**
     * Update the specified resource in storage.
     */
    public function cancelBooking($id) 
    {
        $this->authorize('cancel_booking', Booking::class);
        return $this->service->cancelBooking($id);
    }

}
