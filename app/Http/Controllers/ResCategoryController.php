<?php

namespace App\Http\Controllers;

use App\Models\ResCategory;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view(
            'app.res_categories.index',
            compact('resCategories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ResCategory::class);

        return view('app.res_categories.create');
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

        return redirect()
            ->route('app.res_categories.index', $resCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResCategory $resCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ResCategory $resCategory)
    {
        $this->authorize('view', $resCategory);

        return view('app.res_categories.show', compact('resCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResCategory $resCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ResCategory $resCategory)
    {
        $this->authorize('update', $resCategory);

        return view('app.res_categories.edit', compact('resCategory'));
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

        return redirect()
            ->route('res-categories.edit', $resCategory)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('res-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
