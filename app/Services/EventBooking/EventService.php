<?php 

namespace App\Services\EventBooking;

use App\Http\Resources\EventBooking\EventResource;
use App\Models\EventBooking\Event;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EventService extends BaseService {

    private $model;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    public function grid(Request $request, $number_per_page) 
    {
        $start = microtime(true);

        $search = $request['search'];
        // $location = $request['location'];
        // $date = $request['date'];
        $sort = $request['sort'] ? $request['sort'] : 'title';
        $order = $request['order'] ? $request['order'] : 'asc';
       
        $query = $this->model
            ->when($search, function ($query) use ($search) {
                $query->keywordSearch($search);
            })
            // ->when($location, function ($query, $location) {
            //     $query->where('location', $location);
            // })
            // ->when($date, function ($query, $date) {
            //     $formatted_date = Carbon::parse($date)->format('Y-m-d');
            //     $query->whereDate('date', $formatted_date);
            // })
            ->orderBy($sort, $order);
        $data = $query->paginate($number_per_page); 

        $lists = Cache::remember('all_events', now()->addMinutes(10), function () use ($data) {
            return $data; 
        });

        return $this->apiResponse(200, "Found {$lists->total()} events in total", $lists, 200, '', '', $start);
    }

    public function create(array $data) 
    {
        return $this->executeFunction(function() use ($data) {
            $user = Auth::user();

            $data['created_by'] = $user->id;

            $this->model->create($data);

            Cache::forget('all_events'); 

            return new EventResource($data);
        });
    }

    public function update($id,$data) 
    {
        return $this->executeFunction(function() use ($id, $data) {

            $event_data = tap($this->model->find($id))->update($data);

            Cache::forget('all_events'); 

            return new EventResource($event_data);
        });
    }

    public function delete($id) 
    {
        return $this->executeFunction(function() use ($id) {

            $data = tap($this->model->find($id))->delete();

            Cache::forget('all_events'); 

            return new EventResource($data);
        });
    }

    public function getById($id) 
    {
        $start = microtime(true);
       
        $data = $this->model->with('tickets')->where('id', $id)->first();

        $list = Cache::remember('all_events', now()->addMinutes(10), function () use ($data) {
            return $data; 
        });

        return $this->jsonResponse(200, "Good", $list, 200, '', '', $start);
    }

}