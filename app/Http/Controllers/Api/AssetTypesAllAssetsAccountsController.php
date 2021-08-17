<?php

namespace App\Http\Controllers\Api;

use App\Models\AssetTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssetsAccountsResource;
use App\Http\Resources\AssetsAccountsCollection;

class AssetTypesAllAssetsAccountsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetTypes $assetTypes
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, AssetTypes $assetTypes)
    {
        $this->authorize('view', $assetTypes);

        $search = $request->get('search', '');

        $allAssetsAccounts = $assetTypes
            ->allAssetsAccounts()
            ->search($search)
            ->latest()
            ->paginate();

        return new AssetsAccountsCollection($allAssetsAccounts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetTypes $assetTypes
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AssetTypes $assetTypes)
    {
        $this->authorize('create', AssetsAccounts::class);

        $validated = $request->validate([
            'asset_name' => ['required', 'max:255', 'string'],
            'quantity' => ['required', 'numeric'],
            'supplier' => ['required', 'max:255', 'string'],
            'price' => ['required', 'numeric'],
        ]);

        $assetsAccounts = $assetTypes->allAssetsAccounts()->create($validated);

        return new AssetsAccountsResource($assetsAccounts);
    }
}
