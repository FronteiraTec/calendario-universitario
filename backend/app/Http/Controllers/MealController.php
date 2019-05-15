<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MealController extends Controller
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
        $meals = Event
            ::whereYearAndMonth($request->query('year'), $request->query('month'))
            ->where("type", "menu")
            ->get();
        return view("meals.index", compact("meals", "actualFilter","nextMonth", "prevMonth"));
    }

    public function indexApi()
    {
        $meals = Event::where("type", "menu")->orderBy("scheduledDay")->get();
        return response()->json($meals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("meals.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meal = Event::create([
            "name" => "",
            "scheduledDay" => $request->scheduledDay,
            "type" => "menu",
            "description" => $request->description
        ]);
        return redirect()->route("meal.show", ["id" => $meal->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $meal)
    {
        return view("meals.show", ["meal" => $meal]);
    }

    public function showApi(Event $meal)
    {
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $meal)
    {
        return view("meals.edit", ["meal" => $meal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $meal)
    {
        $meal->update([
            "scheduledDay" => $request->scheduledDay,
            "description" => $request->description
        ]);
        return redirect()->route("meal.show", ["id" => $meal->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $meal)
    {
        $meal->delete();
        return redirect()->route("meal.index");
    }
}
