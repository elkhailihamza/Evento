<?php

namespace App\Http\Middleware;

use App\Models\Event;
use App\Models\Reservation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPdfUserTicket
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $reservation = $request->route('reservation');
        $reservation = Reservation::find($reservation->id);

        if ($reservation->status && $reservation->user_id == auth()->user()->id) {
            return $next($request);
        }

        return redirect()->back();
    }
}
