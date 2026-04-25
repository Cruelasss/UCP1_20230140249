<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
    // withCount('products') digunakan untuk menampilkan TOTAL PRODUCT seperti di gambar
    $categories = Category::withCount('products')->get();
    return view('category.index', compact('categories'));
}

public function create() {
    return view('category.create');
}

public function store(Request $request) {
    $request->validate(['name' => 'required|unique:categories,name']);
    Category::create($request->all());
    return redirect()->route('category.index')->with('success', 'Category saved!');
}

    public function show($id)
    {
        // Kosongkan dulu untuk sekarang
    }

    public function edit($id)
    {
        // Kosongkan dulu untuk sekarang
    }

    public function update(Request $request, $id)
    {
        // Kosongkan dulu untuk sekarang
    }

    public function destroy($id)
    {
        // Kosongkan dulu untuk sekarang
    }
}