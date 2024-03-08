<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReservationController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $reservation = $request->validate([
            'info' => 'nullable|string|max:255',
            'ticket' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $ticketId = $request->input('ticket');
        $ticket = Ticket::find($ticketId);
        $status = $event->status;

        if ($ticket->tickets_left > 0) {
            $reservation['ticket_id'] = $ticketId;
            $reservation['user_id'] = $user_id;
            $reservation['status'] = $status;

            Reservation::create($reservation);
            $ticket->decrement('tickets_left');
            return redirect()->back()->with(['success' => 'Created a reservation']);
        }
        return redirect()->back()->withErrors('Reservation Error!');
    }
}
