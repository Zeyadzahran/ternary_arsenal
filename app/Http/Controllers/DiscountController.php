<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Country;
use App\Models\Product;





class DiscountController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $query = Discount::with(['product', 'toCountry', 'fromCountry']);

        if ($user->isAdmin()) {
            $teamCountryIds = $this->getTeamCountries()->pluck('id');
            $query->whereIn('to_country_id', $teamCountryIds);
        }

        $discounts = $query->get();
        $countries = $this->getAvailableCountries();

        return view('discounts.index', compact('discounts', 'countries'));
    }

    public function create()
    {
        $products = $this->getAvailableProducts();
        $countries = $this->getAvailableCountries();

        return view('discounts.create', compact('products', 'countries'));
    }



    /**
     * Store a newly created discount in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'        => 'required|exists:products,id',
            'to_country_id'     => 'required|exists:countries,id',
            'discount_percent'  => 'nullable|numeric|min:0|max:100',
        ]);

        $user = auth()->user();

        $discount = Discount::updateOrCreate(
            [
                'product_id'     => $request->product_id,
                'to_country_id'  => $request->to_country_id,
            ],
            [
                'from_country_id'    => $user->country_id,
                'discount_percent'   => $request->discount_percent,
            ]
        );

        return redirect()->route('discounts.index')->with('success', 'Discount saved successfully.');
    }

    /**
     * Show the form for editing the specified discount.
     */
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);

        $this->authorizeDiscountAccess($discount);

        $products = $this->getAvailableProducts();
        $countries = $this->getAvailableCountries();

        return view('discounts.edit', compact('discount', 'products', 'countries'));
    }


    /**
     * Update the specified discount in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id'        => 'required|exists:products,id',
            'to_country_id'     => 'required|exists:countries,id',
            'discount_percent'  => 'nullable|numeric|min:0|max:100',
        ]);

        $discount = Discount::findOrFail($id);
        $discount->update([
            'product_id'       => $request->product_id,
            'to_country_id'    => $request->to_country_id,
            'discount_percent' => $request->discount_percent,
        ]);

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }


    /**
     * Remove the specified discount from storage.
     */
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
    private function getTeamCountries()
    {
        return Country::where('team', auth()->user()->country?->team)->get();
    }

    private function getAvailableProducts()
    {
        if (auth()->user()->isRuler()) {
            return Product::with('country')->get(); 
        }

        return Product::with('country')->where('country_id', auth()->user()->country_id)->get();
    }


    private function getAvailableCountries()
    {
        if (auth()->user()->isRuler()) {
            return Country::all();
        }

        return $this->getTeamCountries();
    }

    private function authorizeDiscountAccess(Discount $discount)
    {
        if (auth()->user()->isRuler()) return;

        $allowedCountryIds = $this->getTeamCountries()->pluck('id');
        if (! $allowedCountryIds->contains($discount->to_country_id)) {
            abort(403);
        }
    }
}
