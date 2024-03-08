<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories(Request $request = null)
    {
        $categories = Category::get();
        $event = $request->input('event') ?? null;
        return view('layouts.components.category-option', ['categories' => $categories, 'event' => $event]);
    }
}
