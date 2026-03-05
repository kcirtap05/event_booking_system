<?php 

namespace App\Services\EventBooking;

use App\Http\Resources\EventBooking\BookingResource;
use App\Models\EventBooking\Booking;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BookingService extends BaseService {

    private $model;

    public function __construct(Booking $model)
    {
        $this->model = $model;
    }

    public function grid(Request $request, $number_per_page) 
    {
        $start = microtime(true);

        $sort = $request['sort'] ? $request['sort'] : 'created_at';
        $order = $request['order'] ? $request['order'] : 'asc';

        $user = Auth::user();
       
        $query = $this->model->where('user_id', $user->id)->orderBy($sort, $order);

        $data = $query->paginate($number_per_page); 

        $lists = Cache::remember('all_bookings', now()->addMinutes(10), function () use ($data) {
            return $data; 
        });

        return $this->apiResponse(200, "Found {$lists->total()} events in total", $lists, 200, '', '', $start);
    }

    public function create($ticket_id, $data) 
    {
        return $this->executeFunction(function() use ($ticket_id, $data) {

            $user = Auth::user();

            $data['user_id'] = $user->id;
            $data['ticket_id'] = $ticket_id;

            $this->model->create($data);

            Cache::forget('all_bookings'); 

            return new BookingResource($data);
        });
    }

    public function cancelBooking($id) 
    {
        return $this->executeFunction(function() use ($id) {

            $data['status'] = 'cancelled';

            $event_data = tap($this->model->find($id))->update($data);

            Cache::forget('all_bookings'); 

            return new BookingResource($event_data);
        });
    }

}