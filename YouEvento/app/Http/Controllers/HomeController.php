<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::join('tickets', 'events.id', '=', 'tickets.event_id')->select('events.*')->where('tickets.ticket_qnt', '>', 0)->where('status', 1)->whereNot('category_id', NULL)->groupBy('events.id')->orderByDesc('created_at')->paginate(6);
        return view('index', compact('events'));
    }
}
