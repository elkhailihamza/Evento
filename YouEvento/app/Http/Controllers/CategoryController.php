<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::get();
        return view('layouts.components.category-option', ['categories' => $categories]);
    }
}
