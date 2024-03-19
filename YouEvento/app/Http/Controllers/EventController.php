<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::join('tickets', 'events.id', '=', 'tickets.event_id')->select('events.*')->where('tickets.ticket_qnt', '>', 0)->where('status', 1)->whereNot('category_id', NULL)->groupBy('events.id')->orderByDesc('created_at')->paginate(6);
        return view('events', compact('events'));
    }
    public function viewEvent(Event $event)
    {
        return view('eventView', ['event' => $event]);
    }
    public function viewStatistics(Event $event)
    {
        return view('statistics', compact('event'));
    }
    public function find($event)
    {
        $found = Reservation::join('tickets', 'tickets.id', '=', 'reservations.ticket_id')
            ->where('reservations.user_id', auth()->user()->id)
            ->where('tickets.event_id', $event->id)
            ->first();
        return $found;
    }
    public function RequestValidate($request, $event = null)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'location' => 'required|string|max:255',
                'date' => 'required|date_format:Y-m-d\TH:i',
                'validation' => 'required|boolean',
            ]);

            if ($event && file_exists(storage_path('app/public/' . $event->cover))) {
                unlink(storage_path('app/public/' . $event->cover));
            }

            $imagePath = $request->file('cover')->store('uploads', 'public');

            $data['category_id'] = $request->input('category');
            $data['cover'] = $imagePath;
            $data['automated'] = $request->input('validation');
            $data['user_id'] = auth()->user()->id;

            return $data;
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Event Store Error!',
                'error' => $e->errors(),
            ]);
        }
    }
    public function store(Request $request, Event $event)
    {
        $found = $this->find($event);
        if (!$found) {
            $data = $this->RequestValidate($request);
            $event = Event::create($data);
            return redirect(route('viewEvent', ['event' => $event]));
        } else {
            return redirect()->back()->with('error', 'Already made a reservation!');
        }
    }
    public function update(Request $request, Event $event)
    {
        $found = $this->find($event);
        if ($found) {
            $data = $this->RequestValidate($request);
            $event->update($data);
            return redirect(route('viewEvent', ['event' => $event]));
        } else {
            return redirect()->back()->with('error', 'Event or Reservation Not Found!');
        }
    }
    public function getEvents()
    {
        $events = Event::where('user_id', auth()->user()->id)->paginate(5);
        return view('layouts.components.searched-card-sidebar', ['events' => $events]);
    }
    public function getEvent(Request $request)
    {
        $event = Event::find($request->input('event_id'));
        return view('layouts.components.edit-modal', ['event' => $event]);
    }
    public function search(Request $request)
    {
        try {
            $request->validate([
                'search' => 'required|string',
                'sortBy' => 'required|in:1,2',
            ]);

            $searchValue = $request->input('search');
            $sortBy = $request->input('sortBy');

            switch ($sortBy) {
                case 1:
                    $events = Event::with('category')->where('title', 'like', '%' . $searchValue . '%')->get();
                    break;
                case 2:
                    $categories = Category::select('id', 'category_name')->where('category_name', 'like', '%' . $searchValue . '%')->get();
                    break;
                default:
                    return response()->json([
                        'error' => 'Not Found!'
                    ]);
            }
            return view('layouts.components.searched-card', ['events' => $events ?? null, 'categories' => $categories ?? null]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors(),
            ]);
        }
    }
}
