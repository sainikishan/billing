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
}
