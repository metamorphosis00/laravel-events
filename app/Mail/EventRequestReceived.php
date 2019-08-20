<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Event;
use App\EventRequest;

class EventRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $eventRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventRequest $eventRequest)
    {
        $this->eventRequest = $eventRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.event_request.received');
    }
}
