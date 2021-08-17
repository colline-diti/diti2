<?php

namespace App\Http\Controllers\Api;

use App\Models\ResCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResProductResource;
use App\Http\Resources\ResProductCollection;

class ResCategoryResProductsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResCategory $resCategory
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ResCategory $resCategory)
    {
        $this->authorize('view', $resCategory);

        $search = $request->get('search', '');

        $resProducts = $resCategory
            ->resProducts()
            ->search($search)
            ->latest()
            ->paginate();

        return new ResProductCollection($resProducts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResCategory $resCategory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ResCategory $resCategory)
    {
        $this->authorize('create', ResProduct::class);

        $validated = $request->validate([
            'product_name' => ['required', 'max:255', 'string'],
            'category' => ['required', 'max:255', 'string'],
        ]);

        $resProduct = $resCategory->resProducts()->create($validated);

        return new ResProductResource($resProduct);
    }
}
