<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Event;
use App\User;
use App\Http\Requests\UpdateEvent;
use App\Http\Requests\StoreEvent;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        $events = $events->filter(function($event) {
            return Auth::user()->can('view', $event);
        })->pluck('id')->toArray();

        $events = Event::whereIn('id', $events)->paginate(15);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent $request)
    {
        $validated = $request->validated();
        $event = new Event();
        $event->fill($validated);
        $event->user_id = User::where('email', $validated['organizer-email'])->first()->id;
        $event->save();

        return redirect()->back()->with('message', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.events.edit', ['event' => Event::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent $request, $id)
    {
        $validated = $request->validated();
        $event = Event::find($id);
        $event->fill($validated);
        $event->save();

        return redirect()->back()->with('message', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);

        return redirect()->back()->with('message', 'Event deleted successfully');
    }
}
