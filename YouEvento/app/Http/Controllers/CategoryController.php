<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories(Request $request)
    {
        $categories = Category::get();
        $event = Event::find($request->input('event')) ?? null;
        return view('layouts.components.category-option', ['categories' => $categories, 'event' => $event]);
    }
}
