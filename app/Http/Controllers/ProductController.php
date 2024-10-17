<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('products.index',[
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'string|max:255',
            'unit' => 'required|string|max:8',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'rack' => 'required|string|max:8',
            'description' => 'string|max:255',
            'expired_at' => 'required|date',
        ]);
 
        Product::create($validated);
 
        return redirect()->route('products.index')->with('message', 'Product berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'string|max:255',
            'unit' => 'required|string|max:8',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'rack' => 'required|string|max:8',
            'description' => 'string|max:255',
            'expired_at' => 'required|date',
        ]);
 
        $product->update($validated);
 
        return redirect()->route('products.index')->with('message', 'Product berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
 
        return redirect()->route('products.index')->with('message', 'Product sudah didelete');
    }
}
