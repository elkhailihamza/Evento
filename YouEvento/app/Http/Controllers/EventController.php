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
        $events = Event::paginate(6);
        return view('events', compact('events'));
    }
    public function viewEvent(Event $event)
    { 
        return view('eventView', ['event' => $event]);
    }
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'location' => 'required|string|max:255',
                'date' => 'required|date_format:Y-m-d\TH:i',
                'validation' => 'required|boolean'
            ]);

            $imagePath = $request->file('cover')->store('uploads', 'public');

            $data['category_id'] = $request->input('category');
            $data['user_id'] = auth()->user()->id;
            $data['cover'] = $imagePath;
            $data['automated'] = $request->input('validation');            

            Event::create($data);

            return redirect()->back();
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Event Store Error!',
                'error' => $e->errors(),
            ]);
        }
    }
    public function getEvents()
    {
        $events = Event::where('user_id', auth()->user()->id)->paginate(5);
        return view('layouts.components.searched-card-sidebar', ['events' => $events]);
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
                    foreach ($categories as $category) :
                        $events[$category->category_name] = Event::where('category_id', $category->id)->get();
                    endforeach;
                    break;
                default:
                    return response()->json([
                        'error' => 'Not Found!'
                    ]);
            }
            return view('layouts.components.searched-card', ['events' => $events]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors(),
            ]);
        }
    }
}
