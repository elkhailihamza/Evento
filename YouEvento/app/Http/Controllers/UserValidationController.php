<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class UserValidationController extends Controller
{
    public function index(Event $event)
    {
        return view('user-validation', compact('event'));
    }
    public function accept(Event $event, User $user)
    {
        $reservation = Reservation::join('tickets', 'reservations.ticket_id', '=', 'tickets.id')->where('reservations.user_id', $user->id)->where('tickets.event_id', $event->id)->first();
        if ($reservation) {
            $reservation->status = 1;
            $reservation->save();
            return redirect(route('user.validation', $event));
        } else {
            return redirect()->back()->with('error', 'Reservation not Found!');
        }
    }
    public function decline(Event $event, User $user)
    {
        $reservation = Reservation::join('tickets', 'reservations.id', '=', 'tickets.id')->where('reservations.user_id', $user->id)->where('tickets.event_id', $event->id)->first();
        $reservation->status = 2;
        return redirect(route('user.validation', $event));
    }
}
