<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductParticularsResource;
use App\Http\Resources\ProductParticularsCollection;

class ProductAllProductParticularsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {
        $this->authorize('view', $product);

        $search = $request->get('search', '');

        $allProductParticulars = $product
            ->allProductParticulars()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProductParticularsCollection($allProductParticulars);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->authorize('create', ProductParticulars::class);

        $validated = $request->validate([
            'particulars' => ['required', 'max:255', 'string'],
            'quantity' => ['required', 'max:255'],
        ]);

        $productParticulars = $product
            ->allProductParticulars()
            ->create($validated);

        return new ProductParticularsResource($productParticulars);
    }
}
