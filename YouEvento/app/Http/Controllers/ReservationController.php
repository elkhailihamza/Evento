<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $reservation = $request->validate([
                'info' => 'nullable|string|max:255',
                'ticket' => 'required',
            ]);

            $reservation['user_id'] = auth()->user()->id;
            $reservation['ticket_id'] = $request->input('ticket');

            Reservation::create($reservation);

            return redirect()->back();
        } catch (ValidationException $e) {
            return redirect()->back()->with(['errors' => $e->errors()]);
        }
    }
}
