<?php

namespace App\Http\Controllers;

use App\Models\AssetTypes;
use Illuminate\Http\Request;
use App\Models\AssetsAccounts;
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
            ->paginate(5);

        return view(
            'app.all_assets_accounts.index',
            compact('allAssetsAccounts', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', AssetsAccounts::class);

        $allAssetTypes = AssetTypes::pluck('name', 'id');

        return view('app.all_assets_accounts.create', compact('allAssetTypes'));
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

        return redirect()
            ->route('all-assets-accounts.edit', $assetsAccounts)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetsAccounts $assetsAccounts
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssetsAccounts $assetsAccounts)
    {
        $this->authorize('view', $assetsAccounts);

        return view('app.all_assets_accounts.show', compact('assetsAccounts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AssetsAccounts $assetsAccounts
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AssetsAccounts $assetsAccounts)
    {
        $this->authorize('update', $assetsAccounts);

        $allAssetTypes = AssetTypes::pluck('name', 'id');

        return view(
            'app.all_assets_accounts.edit',
            compact('assetsAccounts', 'allAssetTypes')
        );
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

        return redirect()
            ->route('all-assets-accounts.edit', $assetsAccounts)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('all-assets-accounts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
