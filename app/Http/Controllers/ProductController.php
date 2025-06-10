<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        //
        $products = Product::latest()->get();
        return view('admin.index', compact('products'));
    }
    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Please enter the product name.',
            'name.max' => 'Product name cannot exceed 255 characters.',
            'quantity.required' => 'Quantity is required.',
            'quantity.integer' => 'Quantity must be a valid integer.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'images.image' => 'Uploaded file must be an image.',
            'images.max' => 'Image size cannot be more than 2MB.',
        ];
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'images' => 'nullable|image|max:2048', // 2MB max
        ], $messages);

        // Handle image upload
        if ($request->hasFile('images')) {
            $path = $request->file('images')->store('products', 'public');
            $validated['images'] = $path;
        }
        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }
}
