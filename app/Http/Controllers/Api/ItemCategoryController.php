<?php

namespace App\Http\Controllers\Api;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemCategoryResource;
use App\Http\Resources\ItemCategoryCollection;
use App\Http\Requests\ItemCategoryStoreRequest;
use App\Http\Requests\ItemCategoryUpdateRequest;

class ItemCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ItemCategory::class);

        $search = $request->get('search', '');

        $itemCategories = ItemCategory::search($search)
            ->latest()
            ->paginate();

        return new ItemCategoryCollection($itemCategories);
    }

    /**
     * @param \App\Http\Requests\ItemCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemCategoryStoreRequest $request)
    {
        $this->authorize('create', ItemCategory::class);

        $validated = $request->validated();

        $itemCategory = ItemCategory::create($validated);

        return new ItemCategoryResource($itemCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ItemCategory $itemCategory)
    {
        $this->authorize('view', $itemCategory);

        return new ItemCategoryResource($itemCategory);
    }

    /**
     * @param \App\Http\Requests\ItemCategoryUpdateRequest $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        ItemCategoryUpdateRequest $request,
        ItemCategory $itemCategory
    ) {
        $this->authorize('update', $itemCategory);

        $validated = $request->validated();

        $itemCategory->update($validated);

        return new ItemCategoryResource($itemCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ItemCategory $itemCategory)
    {
        $this->authorize('delete', $itemCategory);

        $itemCategory->delete();

        return response()->noContent();
    }
}
