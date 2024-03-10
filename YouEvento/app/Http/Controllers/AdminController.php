<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function events()
    {
        $events = Event::where('status', 0)->get();
        return view('admin.events', compact('events'));
    }
    public function categories()
    {
        return view('admin.categories');
    }
    public function permissions()
    {
        return view('admin.permissions');
    }
    public function approve(Event $event)
    {
        $event->status = 1;
        $event->save();
        return redirect()->back();
    }
    public function decline(Event $event)
    {
        $event->status = 2;
        $event->save();
        return redirect()->back();
    }
}
