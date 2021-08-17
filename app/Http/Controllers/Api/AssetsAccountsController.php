<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\AssetsAccounts;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssetsAccountsResource;
use App\Http\Resources\AssetsAccountsCollection;
use App\Http\Requests\AssetsAccountsStoreRequest;
use App\Http\Requests\AssetsAccountsUpdateRequest;

class AssetsAccountsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', AssetsAccounts::class);

        $search = $request->get('search', '');

        $allAssetsAccounts = AssetsAccounts::search($search)
            ->latest()
            ->paginate();

        return new AssetsAccountsCollection($allAssetsAccounts);
    }

    /**
     * @param \App\Http\Requests\AssetsAccountsStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetsAccountsStoreRequest $request)
    {
        $this->authorize('create', AssetsAccounts::class);

        $validated = $request->validated();

        $assetsAccounts = AssetsAccounts::create($validated);

        return new AssetsAccountsResource($assetsAccounts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetsAccounts $assetsAccounts
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssetsAccounts $assetsAccounts)
    {
        $this->authorize('view', $assetsAccounts);

        return new AssetsAccountsResource($assetsAccounts);
    }

    /**
     * @param \App\Http\Requests\AssetsAccountsUpdateRequest $request
     * @param \App\Models\AssetsAccounts $assetsAccounts
     * @return \Illuminate\Http\Response
     */
    public function update(
        AssetsAccountsUpdateRequest $request,
        AssetsAccounts $assetsAccounts
    ) {
        $this->authorize('update', $assetsAccounts);

        $validated = $request->validated();

        $assetsAccounts->update($validated);

        return new AssetsAccountsResource($assetsAccounts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetsAccounts $assetsAccounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AssetsAccounts $assetsAccounts)
    {
        $this->authorize('delete', $assetsAccounts);

        $assetsAccounts->delete();

        return response()->noContent();
    }
}
