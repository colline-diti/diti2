<?php

namespace App\Http\Controllers\Api;

use App\Models\StockTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemCategoryResource;
use App\Http\Resources\ItemCategoryCollection;

class StockTableItemCategoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, StockTable $stockTable)
    {
        $this->authorize('view', $stockTable);

        $search = $request->get('search', '');

        $itemCategories = $stockTable
            ->itemCategories()
            ->search($search)
            ->latest()
            ->paginate();

        return new ItemCategoryCollection($itemCategories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StockTable $stockTable)
    {
        $this->authorize('create', ItemCategory::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
        ]);

        $itemCategory = $stockTable->itemCategories()->create($validated);

        return new ItemCategoryResource($itemCategory);
    }
}
