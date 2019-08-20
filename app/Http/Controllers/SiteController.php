<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Event;
use App\EventRequest;
use App\Http\Requests\SaveEventRequest;
use App\Mail\EventRequestAccepted;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventRequestReceived;

class SiteController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    private $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage::disk('public');
    }

    public function index()
    {
        $content = ($this->storage->exists('content.html')) ? $this->storage->get('content.html') : null;
        return view('index', compact('content'));
    }

    public function events()
    {
        return view('events', ['events' => Event::paginate(15)]);
    }

    public function eventRequest(Request $request, $id)
    {
        return view('event_request', ['event' => Event::find($id)]);
    }

    /**
     * @param SaveEventRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveEventRequest(SaveEventRequest $request)
    {
        $validated = $request->validated();
        if (EventRequest::where(['email' => $request->input('email'), 'event_id' => $request->input('event_id')])->exists()) {
            return response()->json([
                'type' => 'info',
                'msg'  => 'You already registered to this event'
            ]);
        }

        $eventRequest = new EventRequest();
        $eventRequest->fill($validated);
        $eventRequest->ip = $request->ip();
        $eventRequest->save();

        Mail::to($request->input('email'))
            ->queue(new EventRequestAccepted($eventRequest->event));
        Mail::to($eventRequest->event->user->email)
            ->queue(new EventRequestReceived($eventRequest));

        return response()->json([
           'type' => 'success',
           'msg'  => 'Your request accepted!'
        ]);
    }
}
