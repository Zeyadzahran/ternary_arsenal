<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with(['category', 'country'])->get();
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $catogories = Category::all();
        $countries = Country::all();
        return view('product.create', ['categories' => $catogories, 'countries' => $countries]);
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $atrributes = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'model'       => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'int', 'exists:categories,id'],
            'country_id'  => ['required', 'int', 'exists:countries,id'],
            'price'       => ['required', 'numeric', 'min:0'],
            'stock'       => ['nullable', 'int', 'min:0'],
            'path'        => ['required', 'string', 'max:255'],
        ]);

        Product::create($atrributes);
        return redirect('/product')->with('success', 'Product added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $product = Product::with(['category', 'country'])->findOrFail($id);
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $catogories = Category::all();
        $countries = Country::all();

        return view('product.edit', ['product' => $product, 'categories' => $catogories, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'model'       => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'int', 'exists:categories,id'],
            'country_id'  => ['required', 'int', 'exists:countries,id'],
            'price'       => ['required', 'numeric', 'min:0'],
            'stock'       => ['nullable', 'int', 'min:0'],
            'path'        => ['required', 'string', 'max:255'],
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('success', 'Product deleted successfully!');

    }
}
