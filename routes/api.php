<?php

use App\Http\Controllers\EventBooking\EventController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EventBooking\BookingController;
use App\Http\Controllers\EventBooking\PaymentController;
use App\Http\Controllers\EventBooking\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'getMe']);

    Route::get('/events', [EventController::class, 'grid']);
    Route::get('/events/{id}', [EventController::class, 'getById']);
    Route::post('/event', [EventController::class, 'create']);
    Route::put('/event/{id}', [EventController::class, 'update']);

    Route::post('/events/{event_id}/tickets', [TicketController::class, 'create']);
    Route::put('/tickets/{id}', [TicketController::class, 'update']);
    Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);

    Route::post('/tickets/{id}/bookings', [BookingController::class, 'create']);
    Route::get('/bookings', [BookingController::class, 'grid']);
    Route::put('/bookings/{id}/cancel', [BookingController::class, 'cancelBooking']);

    Route::post('/bookings/{id}/payment', [PaymentController::class, 'createPayment']);
    Route::get('/payments/{id}', [PaymentController::class, 'getById']);
    
});