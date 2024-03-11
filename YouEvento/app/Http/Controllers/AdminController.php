<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\User;
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
        $categories = Category::paginate(6);
        return view('admin.categories', compact('categories'));
    }
    public function permissions()
    {
        $users = User::whereNot('id', auth()->user()->id)->paginate(6);
        return view('admin.permissions', compact('users'));
    }
    public function statistics()
    {
        $events = Event::count();
        $reservations = Reservation::count();
        $users = User::count();
        $tickets = Ticket::count();
        return view('admin.statistics', compact('events', 'reservations', 'users', 'tickets'));
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
    public function ban(User $user) {
        $user->role_id = 4;
        $user->save();
        return redirect(route('admin.permissions'));
    }
}
