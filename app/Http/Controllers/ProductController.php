<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;

use App\Services\CloudinaryService;

class ProductController extends Controller
{
    protected CloudinaryService $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new CloudinaryService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with(['category', 'country']);

        if ($request->has('query')) {
            $searchTerm = $request->query('query');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm . '%')
                    ->orWhere('model', 'like', $searchTerm . '%');
            });
        }


        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if (auth()->check() && auth()->user()->role !== 'admin') {
            $query->where('country_id', auth()->user()->country_id);
        }

        $products = $query->get();
        
        
        
        foreach ($products as $product) {
            $product->image_url = $product->image_public_id
                ? $this->cloudinary->getImageUrl($product->image_public_id)
                : null;
        }
       
        // dd($products);
        
        return view('product.index', compact('products'));
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
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'model'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'country_id'  => 'required|exists:countries,id',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'description' => 'nullable|string',
            'image'       => 'required|image|max:4096',
        ]);




        $validated['image_public_id'] = $this->cloudinary->uploadImage($request->file('image'));


        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product created');
    }


    /**
     * Display the specified resource.
     */



    public function show($id)
    {
        $product = Product::with(['category', 'country'])->findOrFail($id);


        $imageUrl = $product->image_public_id
            ? $this->cloudinary->getImageUrl($product->image_public_id)
            : null;

        return view('product.show', compact('product', 'imageUrl'));
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
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'model'       => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'int', 'exists:categories,id'],
            'country_id'  => ['required', 'int', 'exists:countries,id'],
            'price'       => ['required', 'numeric', 'min:0'],
            'stock'       => ['nullable', 'int', 'min:0'],
            'description' => ['nullable', 'string'],
            'image'       => ['nullable', 'image', 'max:4096'],
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($product->image_public_id) {
                $this->cloudinary->deleteImage($product->image_public_id);
            }

            $validated['image_public_id'] = $this->cloudinary->uploadImage($request->file('image'));
            unset($validated['image']);
        }

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }


    public function showBuyPage(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.buy', ['product' => $product]);
    }

    public function buy(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $quantity = $request->input('quantity');

        $product = Product::findOrFail($id);

        if ($product->stock < $quantity) {
            return redirect()->back()->with('error', 'Not enough stock available!');
        }

        // $product->stock -= $quantity;
        // $product->save();

        \App\Models\Order::create([
            'user_id'   => Auth::id(),
            'product_id' => $product->id,
            'quantity'  => $quantity,
            'status'    => 'pending',
        ]);

        return redirect()->route('product.index')->with('success', 'Order placed for ' . $quantity . ' of ' . $product->name);
    }

    public function liveSearch(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return response()->json([]);
        }

        return Product::query()
            ->with(['category', 'country'])
            ->where('name', 'like', $query . '%')
            ->orWhere('model', 'like', $query . '%')
            ->limit(10)
            ->get(['id', 'name', 'model'])
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'model' => $product->model,
                    'category' => $product->category->name ?? null,
                ];
            });
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }
}
