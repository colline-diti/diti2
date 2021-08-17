<?php

namespace App\Http\Controllers;

use App\Models\AssetTypes;
use Illuminate\Http\Request;
use App\Http\Requests\AssetTypesStoreRequest;
use App\Http\Requests\AssetTypesUpdateRequest;

class AssetTypesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', AssetTypes::class);

        $search = $request->get('search', '');

        $allAssetTypes = AssetTypes::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.all_asset_types.index',
            compact('allAssetTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', AssetTypes::class);

        return view('app.all_asset_types.create');
    }

    /**
     * @param \App\Http\Requests\AssetTypesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetTypesStoreRequest $request)
    {
        $this->authorize('create', AssetTypes::class);

        $validated = $request->validated();

        $assetTypes = AssetTypes::create($validated);

        return redirect()
            ->route('all-asset-types.edit', $assetTypes)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetTypes $assetTypes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssetTypes $assetTypes)
    {
        $this->authorize('view', $assetTypes);

        return view('app.all_asset_types.show', compact('assetTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetTypes $assetTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AssetTypes $assetTypes)
    {
        $this->authorize('update', $assetTypes);

        return view('app.all_asset_types.edit', compact('assetTypes'));
    }

    /**
     * @param \App\Http\Requests\AssetTypesUpdateRequest $request
     * @param \App\Models\AssetTypes $assetTypes
     * @return \Illuminate\Http\Response
     */
    public function update(
        AssetTypesUpdateRequest $request,
        AssetTypes $assetTypes
    ) {
        $this->authorize('update', $assetTypes);

        $validated = $request->validated();

        $assetTypes->update($validated);

        return redirect()
            ->route('all-asset-types.edit', $assetTypes)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetTypes $assetTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AssetTypes $assetTypes)
    {
        $this->authorize('delete', $assetTypes);

        $assetTypes->delete();

        return redirect()
            ->route('all-asset-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
