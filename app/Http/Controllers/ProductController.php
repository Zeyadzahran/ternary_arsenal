<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Discount;
use App\Services\CurrencyService;

use App\Services\CloudinaryService;

class ProductController extends Controller
{
    protected CloudinaryService $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new CloudinaryService();
    }

    public function index(Request $request, CurrencyService $currencyService)
    {
        //  1 ->  query the products
        $query = Product::with(['category', 'country' ]);

        // 2 =>   filter by the name and model 
        if ($request->filled('query')) {
            $searchTerm = $request->query('query');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm . '%')
                    ->orWhere('model', 'like', $searchTerm . '%');
            });
        }

        // 3 =>  filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // 4 => make normal users see just their country products
        if (auth()->check() && auth()->user()->role === 'general' ) {
            $query->where('country_id', auth()->user()->country_id);
        }

        // 5 =>  get the products
        $products = $query->get();
        // dd($products);

        // 6  =>  get user currency
        $user = auth()->user();
        $userCountry = $products
            ->pluck('country') 
            ->filter() 
            ->firstWhere('id', $user?->country_id); 
        $userCurrency = $userCountry?->currency ?? 'USD';

        $discounts = Discount::where('to_country_id', $user?->country_id ?? null)
            ->get()
            ->keyBy('product_id');

        // 7 =>  add to each product their img url , discount and their converted price
        foreach ($products as $product) {
            // img url 
            $product->image_url = $product->image_public_id
                ? $this->cloudinary->getImageUrl($product->image_public_id)
                : null;

            // discount
            $discount = $discounts[$product->id] ?? null;

            // $discount = Discount::where('product_id', $product->id)
            //     ->where('to_country_id', $user?->country_id ?? null)
            //     ->first();

            $originalPrice = $product->price;

            if ($discount) {
                $discountedPrice = $originalPrice * (1 - $discount->discount_percent / 100);
                $product->discount_percent = $discount->discount_percent;
                $product->price_after_discount = $discountedPrice;
            } else {
                $product->discount_percent = null;
                $product->price_after_discount = $originalPrice;
            }

            // Convert price to user's currency
            $productCurrency = $product->country?->currency ?? 'USD';
            $convertedPrice = $currencyService->convert($product->price_after_discount, $productCurrency, $userCurrency);

            $product->converted_price = $convertedPrice;
            $product->viewer_currency = $userCurrency;
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
        ]);




        $validated['image_public_id'] = $this->cloudinary->uploadImage($request->file('image'));

        $discountedPrice = $validated['discounted_price'] ?? null;
        unset($validated['image'], $validated['discounted_price']);

        $product = Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product created');
    }

    public function show($id, CurrencyService $currencyService)
    {
        $product = Product::with(['category', 'country'])->findOrFail($id);

        $user = auth()->user();
        $userCurrency = $user?->country?->currency ?? 'USD';
        $viewerCountryId = $user?->country_id ?? null;

        $product->image_url = $product->image_public_id
            ? $this->cloudinary->getImageUrl($product->image_public_id)
            : null;

        $discount = Discount::where('product_id', $product->id)
            ->where('to_country_id', $viewerCountryId)
            ->first();

        $originalPrice = $product->price;
        $productCurrency = $product->country?->currency ?? 'USD';

        if ($discount) {
            $discountedPrice = $originalPrice * (1 - $discount->discount_percent / 100);
            $product->discount_percent = $discount->discount_percent;
            $product->price_after_discount = $discountedPrice;

            $product->converted_old_price = $currencyService->convert($originalPrice, $productCurrency, $userCurrency);
            $product->converted_price = $currencyService->convert($discountedPrice, $productCurrency, $userCurrency);
        } else {
            $product->discount_percent = null;
            $product->price_after_discount = $originalPrice;
            $product->converted_price = $currencyService->convert($originalPrice, $productCurrency, $userCurrency);
        }

        $product->viewer_currency = $userCurrency;

        return view('product.show', compact('product'));
    }



   public function edit(string $id)
{
    $product = Product::findOrFail($id);
    $user = auth()->user();

    if ($user->role === 'ruler') {
        $countries = Country::all();
    }
    elseif ($user->role === 'admin' && $user->country_id === $product->country_id) {
        $countries = Country::where('id', $user->country_id)->get();
    }
    else {
        abort(403, 'Unauthorized access.');
    }

    $categories = Category::all();

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
            'image'       => ['nullable', 'image', 'max:4096'],
        ]);

        $productData = $validated;

        $product = Product::findOrFail($id);
        $user = auth()->user();

        if ($user->role === 'ruler') {
            $countries = Country::all();
        }
        elseif ($user->role === 'admin' && $user->country_id === $product->country_id) {
            $countries = Country::where('id', $user->country_id)->get();
        }
        else {
            abort(403, 'Unauthorized access.');
        }


        if ($request->hasFile('image')) {
            if ($product->image_public_id) {
                $this->cloudinary->deleteImage($product->image_public_id);
            }

            $productData['image_public_id'] = $this->cloudinary->uploadImage($request->file('image'));
        }

        $product->update($productData);


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
    public function toggleBan($id)
    {
        $product = Product::findOrFail($id);

        if (auth()->user()->role !== 'ruler') {
            abort(403, 'غير مصرح لك');
        }

        $product->is_banned = !$product->is_banned;
        $product->save();

        return redirect()->back()->with('success', 'تم تحديث حالة الحظر بنجاح.');
    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }
    
}
