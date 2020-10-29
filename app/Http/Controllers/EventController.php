<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Helpers\EventHelper;
use App\Http\Requests\StoreEventRequest;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = EventResource::collection(Event::all());

        return response()->json(compact('events'), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::create([
            'name' => $request->name,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
        ]);

        $event = new EventResource($event);

        EventHelper::saveSelectedDays($event->id, $request->selected_days);

        return response()->json(compact('event'), 201);
    }
}
