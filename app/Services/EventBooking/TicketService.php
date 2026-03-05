<?php 

namespace App\Services\EventBooking;

use App\Http\Resources\EventBooking\TicketResource;
use App\Models\EventBooking\Ticket;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TicketService extends BaseService {

    private $model;

    public function __construct(Ticket $model)
    {
        $this->model = $model;
    }

    public function create($event_id, $data) 
    {
        return $this->executeFunction(function() use ($event_id, $data) {

            $data['event_id'] = $event_id;

            $this->model->create($data);

            Cache::forget('all_tickets'); 

            return new TicketResource($data);
        });
    }

    public function update($id,$data) 
    {
        return $this->executeFunction(function() use ($id, $data) {

            $event_data = tap($this->model->find($id))->update($data);

            Cache::forget('all_tickets'); 

            return new TicketResource($event_data);
        });
    }

    public function delete($id) 
    {
        return $this->executeFunction(function() use ($id) {

            $data = tap($this->model->find($id))->delete();

            Cache::forget('all_tickets'); 

            return new TicketResource($data);
        });
    }

}