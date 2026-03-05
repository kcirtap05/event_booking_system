<?php 

namespace App\Services\EventBooking;

use App\Http\Resources\EventBooking\PaymentResource;
use App\Jobs\EventBooking\SendConfirmation;
use App\Models\EventBooking\Booking;
use App\Models\EventBooking\Payment;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PaymentService extends BaseService {

    private $model;

    public function __construct(Payment $model)
    {
        $this->model = $model;
    }

    public function getById($id) 
    {
        $start = microtime(true);
       
        $data = $this->model->where('id', $id)->first();

        $list = Cache::remember('payments', now()->addMinutes(10), function () use ($data) {
            return $data; 
        });

        return $this->jsonResponse(200, "Good", $list, 200, '', '', $start);
    }

    public function createPayment($booking_id, $data) 
    {
        return $this->executeFunction(function() use ($booking_id, $data) {
            $user = Auth::user();
            
            $data['booking_id'] = $booking_id;
            $data['payment_method'] = 'VISA';

            // Mock payment
            \Log::info("Payment processed via {$data['payment_method']} for booking #{$booking_id}");

            $booking_data['status'] = 'confirmed';
            Booking::find($booking_id)->update($booking_data);

            $result = $this->model->create($data);
            dispatch(new SendConfirmation($user->email, $result, 'Confirmed'));

            Cache::forget('all_payments'); 

            return new PaymentResource($data);
        });
    }

}