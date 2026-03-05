<?php

namespace App\Http\Controllers\EventBooking;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventBooking\TicketPostRequest;
use App\Models\EventBooking\Ticket;
use App\Services\EventBooking\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;

    public function __construct(TicketService $service)
    {
        $this->service = $service;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function create($event_id, TicketPostRequest $request)
    {
        $this->authorize('create', Ticket::class);
        return $this->service->create($event_id, $request->validated());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, TicketPostRequest $request) 
    {
        $this->authorize('update', Ticket::class);
        return $this->service->update($id,$request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    {
        $this->authorize('delete', Ticket::class);
        return $this->service->delete($id);
    }

}
