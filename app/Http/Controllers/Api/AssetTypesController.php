<?php

namespace App\Http\Controllers\Api;

use App\Models\AssetTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssetTypesResource;
use App\Http\Resources\AssetTypesCollection;
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
            ->paginate();

        return new AssetTypesCollection($allAssetTypes);
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

        return new AssetTypesResource($assetTypes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetTypes $assetTypes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssetTypes $assetTypes)
    {
        $this->authorize('view', $assetTypes);

        return new AssetTypesResource($assetTypes);
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

        return new AssetTypesResource($assetTypes);
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

        return response()->noContent();
    }
}
