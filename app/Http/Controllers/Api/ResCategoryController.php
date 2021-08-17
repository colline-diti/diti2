<?php

namespace App\Http\Controllers\Api;

use App\Models\ResCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResCategoryResource;
use App\Http\Resources\ResCategoryCollection;
use App\Http\Requests\ResCategoryStoreRequest;
use App\Http\Requests\ResCategoryUpdateRequest;

class ResCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ResCategory::class);

        $search = $request->get('search', '');

        $resCategories = ResCategory::search($search)
            ->latest()
            ->paginate();

        return new ResCategoryCollection($resCategories);
    }

    /**
     * @param \App\Http\Requests\ResCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResCategoryStoreRequest $request)
    {
        $this->authorize('create', ResCategory::class);

        $validated = $request->validated();

        $resCategory = ResCategory::create($validated);

        return new ResCategoryResource($resCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResCategory $resCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ResCategory $resCategory)
    {
        $this->authorize('view', $resCategory);

        return new ResCategoryResource($resCategory);
    }

    /**
     * @param \App\Http\Requests\ResCategoryUpdateRequest $request
     * @param \App\Models\ResCategory $resCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        ResCategoryUpdateRequest $request,
        ResCategory $resCategory
    ) {
        $this->authorize('update', $resCategory);

        $validated = $request->validated();

        $resCategory->update($validated);

        return new ResCategoryResource($resCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResCategory $resCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ResCategory $resCategory)
    {
        $this->authorize('delete', $resCategory);

        $resCategory->delete();

        return response()->noContent();
    }
}
