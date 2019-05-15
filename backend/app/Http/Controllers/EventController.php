<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $year = $request->query('year') ? $request->query('year') : now()->year;
        $month = $request->query('month') ? $request->query('month') : now()->month;
        $actualDate = Carbon::create($year, $month)->locale('pt');
        $actualFilter = [
            "year" => $year,
            "monthName" => $actualDate->getTranslatedMonthName()
        ];
        $nextMonth = Carbon::create($year, $month)->addMonth();
        $prevMonth = Carbon::create($year, $month)->subMonth();
        $events = Event
            ::whereYearAndMonth($request->query('year'), $request->query('month'))
            ->where("type", "event")
            ->orderBy("scheduledTime")
            ->get();
        return view("events.index", compact("events", "actualFilter","nextMonth", "prevMonth"));
    }

    public function indexApi()
    {
        $events = Event
            ::orderBy("scheduledDay")
            ->orderBy("scheduledTime")
            ->get();
        return response()->json($events);
    }

    public function filterMonthApi($month)
    {
        $dateInfo = preg_split("/-/", $month);
        $events = Event::whereYear('scheduledDay', $dateInfo[0])
            ->whereMonth('scheduledDay', $dateInfo[1])
            ->orderBy('scheduledDay')
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
                ? "$request->scheduledTime"
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
