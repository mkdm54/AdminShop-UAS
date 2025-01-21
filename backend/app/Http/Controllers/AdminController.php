<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = Auth::user()->username;
        return view('admin.dashboard', compact('username'));
    }

    public function showAllProducts()
    {
        $username = Auth::user()->username;
        $products =  Product::all();
        return view('admin.show_product', compact('username', 'products'));
    }

    public function searchProduct(Request $request): JsonResponse
    {
        $request->validate([
            'search' => 'required'
        ]);

        $searchProduct =  $request->input('search');

        $result = Product::where('product_name', 'LIKE', '%' . $searchProduct . '%')
            ->orWhere('description', 'LIKE', '%' . $searchProduct . '%')
            ->get();

        if ($result->isEmpty()) {
            return response()->json([
                'message' => 'No products found'
            ], 404);
        }

        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $username = Auth::user()->username;
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

        $validatedData = $request->only(['product_name', 'price', 'description', 'quantity']);
        $validatedData['price'] = (float) $validatedData['price'];
        $validatedData['quantity'] = (int) $validatedData['quantity'];

        $products = Product::create($validatedData);

        return redirect()->route('admin.products')->with('success', 'Product ' . $products->product_name . ' berhasil ditambahkan');
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
        $username = Auth::user()->username;
        $product = Product::findOrFail($id);
        return view('admin.edit_product', compact('product', 'username'));
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

        $validatedData = $request->only(['product_name', 'price', 'description', 'quantity']);
        $validatedData['price'] = (float) $validatedData['price'];
        $validatedData['quantity'] = (int) $validatedData['quantity'];

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('admin.products')->with('success', 'Product ' . $product->product_name . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =  Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product ' . $product->product_name . ' berhasil dihapus');
    }
}
