<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function getTickets(Request $request)
    {
        $tickets = Ticket::where('event_id', $request->input('event_id'))->get();
        return view('layouts.components.ticket-option', ['tickets' => $tickets]);
    }
    public function getTicketInfo(Request $request)
    {
        $ticket = Ticket::where('id', $request->input('ticket'))->first();
        return view('layouts.components.ticket-select-info', ['ticket' => $ticket]);
    }
    public function store(Request $request, Event $event) {

        $found = Ticket::where('ticket_name', $request->input('ticket_name'))->first();

        if ($found) {
            return redirect()->back();
        }

        $ticket = $request->validate([
            'ticket_name' => 'required|string|max:255',
            'ticket_price' => 'required|numeric|gt:0',
            'ticket_qnt' => 'required|numeric|between:1,999',
        ]);

        $ticket['event_id'] = $event->id;
        $ticket['tickets_left'] = $ticket['ticket_qnt'];

        Ticket::create($ticket);

        return redirect()->back();
    }
}
