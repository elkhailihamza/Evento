<?php

namespace App\Http\Controllers;

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
}
