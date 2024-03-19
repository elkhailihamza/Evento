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
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $data['category_name'] = $request->input('title');
        Category::create($data);
        return redirect(route('admin.categories'));
    }
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $data['category_name'] = $request->input('title');
        $category->update($data);
        return redirect(route('admin.categories'))->with('success', 'Category updated successfully');
    }
    public function destroy(Category $category) {
        $category->delete();
        return redirect(route('admin.categories'))->with('success', 'Deleted Category with Success!');
    }
}
