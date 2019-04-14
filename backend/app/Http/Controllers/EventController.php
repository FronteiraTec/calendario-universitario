<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event
            ::orderBy("scheduledDay")
            ->orderBy("scheduledTime")
            ->get();
        return view("events.index", compact("events"));
    }

    public function indexApi()
    {
        $events = Event
            ::orderBy("scheduledDay")
            ->orderBy("scheduledTime")
            ->get();
        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("events.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Event::create([
            "name" => $request->name,
            "description" => $request->description,
            "scheduledDay" => $request->scheduledDay,
            "scheduledTime" => $request->scheduledTime
                ? "$request->scheduledTime:00"
                : null,
            "place" => $request->place
        ]);
        return redirect()->route("event.show", ["id" => $event->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view("events.show", ["event" => $event]);
    }

    public function showApi(Event $event)
    {
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view("events.edit", ["event" => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update([
            "name" => $request->name,
            "description" => $request->description,
            "scheduledDay" => $request->scheduledDay,
            "scheduledTime" => $request->scheduledTime
                ? "$request->scheduledTime:00"
                : null,
            "place" => $request->place
        ]);
        return redirect()->route("event.show", ["id" => $event->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route("event.index");
    }
}
