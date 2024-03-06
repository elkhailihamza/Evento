<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        $categories = Category::get();
        return view('events', compact('events', 'categories'));
    }
    public function store(Request $request)
    {
        // dd($request);
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'location' => 'required|string|max:255',
                'date' => 'required|date_format:Y-m-d\TH:i',
                'seats' => 'required|integer|min:1',
                'category_id' => 'required|integer',
            ]);

            $imagePath = $request->file('cover')->store('uploads', 'public');
            $data['cover'] = $imagePath;

            Event::create($data);

            return redirect(route('index'));

        } catch(ValidationException $e) {
            return response()->json([
                'message' => 'Event Store Error!',
                'error' => $e->errors(),
            ]);
        }
    }
}
