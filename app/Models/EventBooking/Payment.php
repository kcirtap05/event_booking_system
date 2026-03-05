<?php

namespace App\Models\EventBooking;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id', 
        'booking_id', 
        'amount',
        'status'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
