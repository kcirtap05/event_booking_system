<?php

namespace App\Http\Controllers\EventBooking;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventBooking\PaymentRequest;
use App\Models\EventBooking\Payment;
use App\Services\EventBooking\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;

    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function createPayment($booking_id, PaymentRequest $request)
    {
        return $this->service->createPayment($booking_id, $request->validated());
    }

    public function getById($id) 
    {
        return $this->service->getById($id);
    }

   
}
