<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("frontend.home");
    }
    public function search(Request $request)
    {
        $products = Product::orderBy('created_at', 'DESC'); // Build query without executing it

        // Search products where name contains the query
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $products->where('name', 'like', '%' . $searchTerm . '%');
        }

        $products = $products->get(); // Execute the query and retrieve results

        return view('frontend.search', compact('products'));
    }
}
