<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $username =Auth::user()->username;
        return view('admin.dashboard', compact('username'));
    }

    public function showAllProducts()
    {
        $username =Auth::user()->username;
        $products =  Product::all();
        return view('admin.show_product', compact('username','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $username =Auth::user()->username;
        return view('admin.add_product', compact('username'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        $products = Product::create($request->all());
        return redirect()->route('admin.index')->with('success', 'Product ' . $products->name . ' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('admin.index')->with('success', 'Product ' . $product->product_name . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =  Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.index')->with('success', 'Product ' . $product->product_name . ' berhasil dihapus');
    }
}
