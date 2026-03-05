<?php

namespace App\Http\Controllers\EventBooking;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventBooking\EventPostRequest;
use App\Models\EventBooking\Event;
use App\Services\EventBooking\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;

    public function __construct(EventService $service)
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
    public function create(EventPostRequest $request)
    {
        $this->authorize('create', Event::class);
        return $this->service->create($request->validated());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, EventPostRequest $request) 
    {
        $this->authorize('update', Event::class);
        return $this->service->update($id,$request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    {
        $this->authorize('delete', Event::class);
        return $this->service->delete($id);
    }

    public function getById($id) 
    {
        return $this->service->getById($id);
    }
}
