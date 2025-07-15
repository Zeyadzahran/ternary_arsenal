<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Discount;

use App\Services\CloudinaryService;

class ProductController extends Controller
{
    protected CloudinaryService $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new CloudinaryService();
    }

    public function index(Request $request)
    {
        $query = Product::with(['category', 'country']);

        //  Search by name or model
        if ($request->has('query')) {
            $searchTerm = $request->query('query');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm . '%')
                    ->orWhere('model', 'like', $searchTerm . '%');
            });
        }

        // Filter by category
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        //  Normal users see only their country’s products
        if (auth()->check() && auth()->user()->role !== 'admin') {
            $query->where('country_id', auth()->user()->country_id);
        }

        $products = $query->get();

        foreach ($products as $product) {
            // Existing image logic
            $product->image_url = $product->image_public_id
                ? $this->cloudinary->getImageUrl($product->image_public_id)
                : null;

            // 💸 Add discount based on current user's country
            $viewerCountryId = auth()->user()?->country_id;

            $discount = \App\Models\Discount::where('product_id', $product->id)
                ->where('to_country_id', $viewerCountryId)
                ->first();

            if ($discount) {
                $product->discount_percent = $discount->discount_percent;
                $product->discounted_price = round($product->price * (1 - $discount->discount_percent / 100), 2);
            } else {
                $product->discount_percent = null;
                $product->discounted_price = null;
            }
        }


        return view('product.index', compact('products'));
    }


    public function create()
    {
        $catogories = Category::all();
        $countries = Country::all();
        return view('product.create', ['categories' => $catogories, 'countries' => $countries]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'model'            => 'required|string|max:255',
            'category_id'      => 'required|exists:categories,id',
            'country_id'       => 'required|exists:countries,id',
            'price'            => 'required|numeric',
            'stock'            => 'required|integer',
            'description'      => 'nullable|string',
            'image'            => 'required|image|max:4096',
            'discounted_price' => 'nullable|numeric|lt:price'
        ]);




        $validated['image_public_id'] = $this->cloudinary->uploadImage($request->file('image'));

        $discountedPrice = $validated['discounted_price'] ?? null;
        unset($validated['image'], $validated['discounted_price']);

        $product = Product::create($validated);

        if ($discountedPrice) {
            Discount::create([
                'product_id' => $product->id,
                'discounted_price' => $discountedPrice,
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Product created');
    }

    public function show($id)
    {
        $product = Product::with(['category', 'country', 'discount'])->findOrFail($id);

        $imageUrl = $product->image_public_id
            ? $this->cloudinary->getImageUrl($product->image_public_id)
            : null;

        return view('product.show', compact('product', 'imageUrl'));
    }

   public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $user = auth()->user();

        if ($user->role !== 'admin' || $user->country_id !== $product->country_id) {
            abort(403, 'Unauthorized access.');
        }

        $categories = Category::all();
        $countries = Country::all();

        return view('product.edit', [
            'product' => $product,
            'categories' => $categories,
            'countries' => $countries
        ]);
    }

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
            'discounted_price' => ['nullable', 'numeric', 'min:0'],
            'image'       => ['nullable', 'image', 'max:4096'],
        ]);

        $productData = $validated;
        unset($productData['discounted_price']);

        $product = Product::findOrFail($id);
        $user = auth()->user();

        if ($user->role !== 'admin' || $user->country_id !== $product->country_id) {
            abort(403, 'Unauthorized update.');
        }

        if ($request->hasFile('image')) {
            if ($product->image_public_id) {
                $this->cloudinary->deleteImage($product->image_public_id);
            }

            $productData['image_public_id'] = $this->cloudinary->uploadImage($request->file('image'));
        }

        $product->update($productData);

        if ($request->filled('discounted_price')) {
            $product->discount()->updateOrCreate(
                ['product_id' => $product->id],
                ['discounted_price' => $request->discounted_price]
            );
        } else {
            $product->discount()->delete();
        }

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
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

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }

    
}
